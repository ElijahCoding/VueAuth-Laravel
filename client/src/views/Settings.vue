<template>
  <div>
    Settings

    <ul>
        <router-link
          :to="{
            name: 'otp-enable'
          }"
          v-if="!user.google2fa_enabled"
        >
          Enable 2FA
        </router-link>

        <router-link
          :to="{
            name: 'otp-disable'
          }"
          v-else
        >
          Disable 2FA
        </router-link>
    </ul>
  </div>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    name: 'settings',

    computed: {
      ...mapGetters({
        user: 'auth/user'
      })
    }
  }
</script>
