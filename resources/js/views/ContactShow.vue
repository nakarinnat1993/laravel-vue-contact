<template>
    <div class="contact-show">
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div class="flex justify-between">
                <div class="text-blue-400">
                    Back
                </div>
                <div>
                    <router-link :to="'/contact/' + contact.id +'/edit'" class="px-4 py-2 rounded text-sm text-green-500 border border-green-400 font-bold">Edit</router-link>
                    <a href="#" class="px-4 py-2 rounded text-sm text-red-500 border border-red-400 font-bold">Delete</a>
                </div>
            </div>
            <div class="flex items-center pt-6">
                <!-- <UserCirle name="Jonh Vite"/> -->
                <UserCirle :name="contact.name"/>
                <p class="pl-5 text-xl">{{ contact.name }}</p>
            </div>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Email</p>
            <p class="pt-2 text-blue-400">{{ contact.email}}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Company</p>
            <p class="pt-2 text-blue-400">{{ contact.company}}</p>

            <p class="pt-6 text-gray-600 font-bold uppercase text-sm">Birthday</p>
            <p class="pt-2 text-blue-400">{{ contact.birthday}}</p>
        </div>
    </div>
</template>

<script>
import UserCirle from "../components/UserCircle";
export default {
    name: "ContactShow",
    components:{
        UserCirle
    },
    data(){
        return{
            loading:true,
            contact:null
        }
    },
    mounted(){
        axios.get('/api/contacts/' + this.$route.params.id)
                .then(response =>{
                    // console.log(response.data);
                    this.contact = response.data;
                    this.loading = false;
                }).catch(errors=>{
                    this.errors = errors.response.data.errors;
                    this.loading = false;
                });
    },

};
</script>

<style></style>
