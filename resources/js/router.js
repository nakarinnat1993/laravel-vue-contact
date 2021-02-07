import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from './components/ExampleComponent.vue';
import ContactIndex from './views/ContactIndex.vue';
import ContactCreate from './views/ContactCreate.vue';
import ContactShow from './views/ContactShow.vue';
import ContactEdit from './views/ContactEdit.vue';
import ContactBirthday from './views/ContactBirthday.vue';
import Logout from './actions/Logout.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        {
            path:'/',
            component: ExampleComponent,
            meta: { title:'ExampleComponent' }
        },
        {
            path:'/contacts',
            component: ContactIndex,
            meta: { title:'ContactIndex' }
        },
        {
            path:'/contacts/create',
            component: ContactCreate,
            meta: { title:'ContactCreate' }
        },
        {
            path:'/contacts/:id',
            component: ContactShow,
            meta: { title:'ContactShow' }
        },
        {
            path:'/contacts/:id/edit',
            component: ContactEdit,
            meta: { title:'ContactEdit' }
        },
        {
            path:'/birthdays',
            component: ContactBirthday,
            meta: { title:'ContactBirthday' }
        },
        {
            path:'/logout',
            component: Logout,
            meta: { title:'Logout' }
        },
    ],
    mode: 'history'
});
