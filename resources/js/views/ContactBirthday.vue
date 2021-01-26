<template>
    <div class="contact-birthday">
        <ContactList endpoint="/api/birthdays" />
    </div>
</template>

<script>
import ContactList from "../components/ContactList";

export default {
    name: "ContactBirthday",
    components:{
        ContactList
    }
};
</script>

<style></style>
