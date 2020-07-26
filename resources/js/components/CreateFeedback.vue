<template>
    <div>
        <div>
            <input id="name" v-model="name" type="text">
            <label for="name">Name</label>
            <span style="color: red" v-if="!!errors['name']">{{errors['name'][0]}}</span>
        </div>
        <div>
            <input id="phone" type="text" v-model="phone">
            <label for="phone">Phone</label>
            <span style="color: red" v-if="!!errors['phone']">{{errors['phone'][0]}}</span>
        </div>

        <div>
            <input id="message" type="text" v-model="message">
            <label for="message">Message</label>
            <span style="color: red" v-if="!!errors['message']">{{errors['message'][0]}}</span>
        </div>
        <div>
            <button @click="send()">send</button>
            <span style="color: green" v-if="success">success!!1</span>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateFeedback",
        data() {
            return {
                name: '',
                phone: '',
                message: '',
                errors: [],
                success: false
            }
        },
        methods: {
            send() {
                axios.post('/api/v1/feedback', this.getData())
                    .then(resp => {
                        this.clearForm()
                        this.success = true;
                        setTimeout(()=>{
                            this.success = false
                        }, 3000)
                    })
                    .catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors
                            console.log(error.response.data.errors);
                            setTimeout(() => {
                                this.errors = [];
                            }, 3000)
                        }
                        else {
                            console.log(error.response)
                        }
                    })
            },
            getData()
            {
                let data = new FormData;
                data.append('name', this.name);
                data.append('phone', this.phone);
                data.append('message', this.message);
                return data;
            },
            clearForm()
            {
                this.name = '';
                this.phone = '';
                this.message = '';
                this.errors = []
            }
        }
    }
</script>

<style scoped>

</style>
