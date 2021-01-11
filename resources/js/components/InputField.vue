<template>
    <div class="input-field">
        <div class="relative pb-4">
            <label
                :for="name"
                class="text-blue-500 uppercase text-xs font-bold absolute pt-2"
                >{{ label }}</label
            >
            <input
                type="text"
                :id="name"
                class="pt-8 w-full border-b pb-2 focus:outline-none focus:border-blue-400"
                :class="errorClassOject()"
                :placeholder="placeholder"
                @input="updateField()"
                v-model="value"
            />
            <p class="text-red-500 text-xs" v-text="errorMessage()">Error</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "inputField",
    props:[
        'name',
        'label',
        'placeholder',
        'errors'
    ],
    data() {
        return {
            value:''
        }
    },
    computed:{
        hasError(){
            return this.errors && this.errors[this.name] && this.errors[this.name].length >0;
        }
    },
    methods: {
        updateField(){
            this.clearError(this.name);
            this.$emit("update:field", this.value)
        },
        errorMessage(){
            if(this.hasError){
                return this.errors[this.name][0];
            }
        },
        clearError(){
            if(this.hasError){
                this.errors[this.name] = null;
            }
        },
        errorClassOject(){
            return {
                'error-field': this.hasError
            }
        }
    },

};
</script>

<style scoped>
    .error-field{
        border-color: red;
    }
</style>
