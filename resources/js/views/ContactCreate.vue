<template>
    <div class="contact-create">
        <form @submit.prevent="submitForm">

            <InputFiled name="name" label="Contact Name" placeholder="Contact Name" :errors="errors" @update:field="form.name = $event"/>

            <InputFiled name="email" label="Contact Email" placeholder="Contact Email" :errors="errors" @update:field="form.email = $event"/>

            <InputFiled name="company" label="Contact Company" placeholder="Contact Company" :errors="errors" @update:field="form.company = $event"/>

            <InputFiled name="birthday" label="Contact Birthday" placeholder="MM/DD/YYYY" :errors="errors" @update:field="form.birthday = $event"/>



            <div class="flex justify-end">
                <button class="p-2 rounded text-red-700 border mr-2 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 p-2 rounded text-white hover:bg-blue-400">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
import InputFiled from "../components/InputField";
export default {
    name: "ContactCreate",
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
    methods: {
        submitForm(){
            // console.log(this.form);
            axios.post('/api/contacts', this.form)
                .then(response =>{

                }).catch(errors=>{
                    this.errors = errors.response.data.errors;
                });
        }
    },
};
</script>

<style></style>
