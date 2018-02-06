<template>
    <div class="question">
        <div class="card">
            <div class="card-body">
                <template v-if="!finish">
                    <h5 class="card-title">{{ question.title }}</h5>

                    <p class="card-text">
                        <div v-for="opt in question.options"
                             class="form-check">
                            <input v-model="option"
                                   :id="opt.id"
                                   :value="opt.id"
                                   class="form-check-input" type="radio" name="option">
                            <label :for="opt.id"
                                   class="form-check-label">
                                {{ opt.title }}
                            </label>
                        </div>
                    </p>

                    <a @click.stop.prevent="answerQuestion()"
                       :class="['btn btn-primary', { 'disabled': !option }]"
                       href>ANSWER</a>
                </template>

                <template v-else>
                    The End!
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            this.getFirstQuestion();
        },

        data() {
            return {
                question: {},
                option: '',
                finish: false
            };
        },

        methods: {
            getFirstQuestion() {
                axios.get('/api/questions/1').then((response) => {
                    this.question = response.data;
                });
            },

            answerQuestion() {
                const data = {
                    option: this.option
                };
                axios.put('/api/questions/'+this.question.id+'/answer', data).then((response) => {
                    this.question = response.data;
                    this.option = '';

                    if (_.isEmpty(response.data)) {
                        this.finish = true;
                    }
                });
            },
        },
    };
</script>
