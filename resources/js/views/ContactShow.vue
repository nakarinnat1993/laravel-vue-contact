<template>
    <div class="contact-show">
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div class="flex justify-between">
                <a href="#" class="text-blue-400" @click="$router.back()">
                    Back
                </a>
                <div class="relative">
                    <router-link :to="'/contacts/' + contact.id +'/edit'" class="px-4 py-2 rounded text-sm text-green-500 border border-green-400 font-bold">Edit</router-link>
                    <button @click="modal = !modal" class="px-4 py-2 rounded text-sm text-red-500 border border-red-400 font-bold">Delete</button>
                    <div v-if="modal" class="absolute bg-blue-900 text-white rounded-lg z-20 p-8 w-64 right-0 mt-2">
                        <p>Are you sure you want to delete?</p>
                        <div class="flex items-center mt-6 justify-end">
                            <button class="text-white pr-4" @click="modal = !modal">Cancal</button>
                            <button class="px-4 py-2 bg-red-500 rounded text-sm font-bold" @click="destroy()">Delete</button>
                        </div>
                    </div>
                </div>
                <div v-if="modal" @click="modal = !modal" class="bg-black opacity-25 absolute right-0 left-0 top-0 bottom-0 z-10"></div>
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
            modal:false,
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
                    if(errors.response.status === 404){
                        this.$router.push('/contacts');
                    }
                });
    },
    methods: {
        destroy(){
            axios.delete('/api/contacts/'+this.$route.params.id)
                .then(response => {
                    this.$router.push('/contacts');
                })
                .catch(error =>{
                    alert("Error");
                });
        }
    },

};
</script>

<style></style>
