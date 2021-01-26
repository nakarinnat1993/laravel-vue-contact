import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from './components/ExampleComponent.vue';
import ContactIndex from './views/ContactIndex.vue';
import ContactCreate from './views/ContactCreate.vue';
import ContactShow from './views/ContactShow.vue';
import ContactEdit from './views/ContactEdit.vue';
import ContactBirthday from './views/ContactBirthday.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        { path:'/', component: ExampleComponent },
        { path:'/contacts', component: ContactIndex },
        { path:'/contacts/create', component: ContactCreate },
        { path:'/contacts/:id', component: ContactShow },
        { path:'/contacts/:id/edit', component: ContactEdit },
        { path:'/birthdays', component: ContactBirthday },
    ],
    mode: 'history'
});
