<template>
  <div class='logout'>
      You have been successfully logged out!
  </div>
</template>

<script>
export default {
    name:"Logout",
    created(){
        axios.post('/logout',{})
            .finally( err=>{
                window.location = '/login';
            })
    }
}
</script>

<style>

</style>
