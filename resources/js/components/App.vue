<template>
    <div class="app">
        <div class="flex">
            <div class="pl-4 pt-2 bg-gray-200 w-48 h-screen border-r-2 border-gray-400">
                <nav>
                    <router-link to="/"><h1 class="text-3xl font-bold">Contacts</h1></router-link>

                    <p class="pt-10 text-gray-500 text-xs uppercase font-bold">Create</p>
                    <router-link to="/contacts/create" class="flex items-center p-2 text-sm hover:text-blue-400"><i class="fa fa-plus" aria-hidden="true"></i> <p class="tracking-wide pl-3 font-bold">Add New</p> </router-link>

                    <p class="pt-10 text-gray-500 text-xs uppercase font-bold">General</p>
                    <router-link to="/x" class="flex items-center p-2 text-sm hover:text-blue-400"><i class="fa fa-list-alt" aria-hidden="true"></i> <p class="tracking-wide pl-3 font-bold">Contacts</p> </router-link>
                    <router-link to="/x" class="flex items-center p-2 text-sm hover:text-blue-400"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <p class="tracking-wide pl-3 font-bold">Birthdays</p> </router-link>

                    <p class="pt-10 text-gray-500 text-xs uppercase font-bold">Settings</p>
                    <router-link to="/x" class="flex items-center p-2 text-sm hover:text-blue-400"><i class="fa fa-unlock" aria-hidden="true"></i> <p class="tracking-wide pl-3 font-bold">Logout</p> </router-link>

                </nav>
            </div>
            <div class="flex flex-col flex-1 h-screen overflow-y-hidden">
                <div class="h-16 px-5 border-b border-gray-400 flex items-center justify-between">
                    <div>
                        Contacts
                    </div>
                    <div class="rounded-full text-white bg-blue-400 w-10 h-10 flex justify-center items-center border border-gray-400">
                        NK
                    </div>
                </div>
                <div class="flex flex-col overflow-y-hidden flex-1">
                    <router-view class="p-6 overflow-x-hidden"></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"App"
}
</script>

<style>

</style>
