<template>
  <form action="#" @submit.prevent="submit">
    <div>
      <label for="password">
        Password
      </label>
      <input type="password" name="password" id="password" v-model="form.password">
    </div>

    <div>
      <input type="submit" value="Disable">
    </div>
  </form>
</template>

<script>
  import axios from 'axios'

  import { mapActions } from 'vuex'

  export default {
    name: 'otp-disable',

    data () {
      return {
        form: {
          password: ''
        }
      }
    },

    methods: {
      ...mapActions({
        attempt: 'auth/attempt'
      }),

      async submit () {
        try {
          await axios.delete('auth/otp', {
            data: {
              ...this.form
            }
          })

          await this.attempt()

          this.$router.push({
            name: 'settings'
          })
        } catch (e) {
          //
        }
      }
    }
  }
</script>
