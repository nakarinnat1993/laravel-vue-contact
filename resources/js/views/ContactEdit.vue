<template>
    <div class="contact-edit">
        <div class="flex justify-between">
            <a href="#" class="text-blue-400" @click="$router.back()">
                Back
            </a>
        </div>
        <form @submit.prevent="submitForm">

            <InputFiled name="name" label="Contact Name" placeholder="Contact Name" :errors="errors" @update:field="form.name = $event" :data="form.name"/>

            <InputFiled name="email" label="Contact Email" placeholder="Contact Email" :errors="errors" @update:field="form.email = $event" :data="form.email"/>

            <InputFiled name="company" label="Contact Company" placeholder="Contact Company" :errors="errors" @update:field="form.company = $event" :data="form.company"/>

            <InputFiled name="birthday" label="Contact Birthday" placeholder="MM/DD/YYYY" :errors="errors" @update:field="form.birthday = $event" :data="form.birthday"/>



            <div class="flex justify-end">
                <button class="p-2 rounded text-red-700 border mr-2 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 p-2 rounded text-white hover:bg-blue-400">Edit</button>
            </div>
        </form>
    </div>
</template>

<script>
import InputFiled from "../components/InputField";
export default {
    name: "ContactEdit",
    components:{
        InputFiled
    },
    data() {
        return {
            form:{
                name:"",
                email:"",
                company:"",
                birthday:"",
            },
            errors : ""
        }
    },
    mounted(){
        axios.get('/api/contacts/' + this.$route.params.id)
                .then(response =>{
                    // console.log(response.data);
                    this.form = response.data;
                    this.loading = false;
                }).catch(errors=>{
                    this.errors = errors.response.data.errors;
                    this.loading = false;
                    if(errors.response.status === 404){
                        this.$router.push('/contacts');
                    }
                });
    },
    methods: {
        submitForm(){
            // console.log(this.form);
            axios.patch('/api/contacts/' + this.$route.params.id, this.form)
                .then(response =>{
                    console.log(response.data);
                    this.$router.push('/contacts/'+response.data.id)
                }).catch(errors=>{
                    this.errors = errors.response.data.errors;
                });
        }
    },
};
</script>

<style></style>
