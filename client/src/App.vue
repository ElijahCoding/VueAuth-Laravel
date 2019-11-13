<template>
  <div>
    <TheNavigation />
    <router-view/>
  </div>
</template>

<script>
  import TheNavigation from '@/components/TheNavigation'

  export default {
    components: {
      TheNavigation
    } 
  }
</script>
