<template>
    <div class="contact-index">
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div v-if="contacts.length === 0">
                <p>No Contacts. <router-link to="/contacts/create">Insert</router-link></p>
            </div>
            <div v-for="(item,index) in contacts" :key="index">
                <router-link :to="'/contacts/'+item.id" class="flex items-center border-b border-gray-400 p-4 hover:bg-gray-100">
                    <UserCircle :name="item.name"/>
                    <div class="pl-4">
                        <p class="text-blue-400 font-bold">{{ item.name }}</p>
                        <p class="text-gray-600">{{ item.company }}</p>
                    </div>

                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import UserCircle from "../components/UserCircle";

export default {
    name: "ContactIndex",
    data() {
        return {
            loading: true,
            contacts: null
        };
    },
    components:{
        UserCircle
    },
    mounted() {
        axios
            .get("/api/contacts")
            .then(response => {
                // console.log(response.data);
                this.contacts = response.data;
                this.loading = false;
            })
            .catch(errors => {
                this.errors = errors.response.data.errors;
                this.loading = false;
                alert("Error");
            });
    }
};
</script>

<style></style>
