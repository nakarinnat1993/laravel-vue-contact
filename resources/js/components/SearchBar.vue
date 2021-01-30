<template>
    <div class="search-bar">
        <div v-if="focus" @click="focus = false" class="bg-black opacity-0 absolute right-0 left-0 top-0 bottom-0 z-10"></div>
        <div class="relative z-10">
            <div class="absolute ml-2 ">
                <i class="fa fa-search" aria-hidden="true"></i>
            </div>
            <input type="text" class="w-64 mr-2 bg-gray-200 border border-gray-400 pl-8 pr-3 py-1 rounded-full text-sm focus:outline-none focus:shadow focus:bg-blue-100" placeholder="Search..." id="searchTerm" v-model="searchTerm" @input="search" @focus="focus=true">
            <div v-if="focus" class="absolute bg-blue-900 text-white rounded-lg p-4 w-96 right-0 mr-4 mt-2 shadow z-20">
                <div v-if="results == 0">No results {{ searchTerm }}</div>
                <div v-for="(result,index) in results" :key="index" @click="focus = false">
                    <router-link :to="'/contacts/'+result.id" class="block py-2">
                        <div class="flex items-center">
                            <UserCirle :name="result.name"/>
                            <div class="pl-3">
                                <p>{{ result.name }}</p>
                                <p>{{ result.company }}</p>
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import _ from 'lodash';
import UserCirle from "../components/UserCircle";

export default {
    name: "searchBar",
    data() {
        return {
            searchTerm:'',
            focus:false,
            results:[]
        }
    },
    components:{
        UserCirle
    },
    methods: {
        search: _.debounce(function(e)  {
            if(this.searchTerm.length<3){
                return;
            }
            axios.post('/api/search',{searchTerm:this.searchTerm})
            .then(response =>{
                console.log(response.data);
                this.results = response.data;
            })
            .catch(error =>{
                console.log(error.response);
            })
        },300)
    },
};
</script>

<style></style>
