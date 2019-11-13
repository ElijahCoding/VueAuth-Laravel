<template>
  <div v-if="otp.image">
    <form action="#" @submit.prevent="submit">
      <div>
        <p>Scan the QR code with your authenticator app</p>
        <img :src="otp.image" alt="OTP QR Code">
      </div>

      <div>
        <label for="otp">
          Code
        </label>
        <input type="text" name="otp" id="otp" v-model="form.otp">
      </div>

      <div>
        <input type="submit" value="Enable">
      </div>
    </form>
  </div>
</template>

<script>
  import axios from 'axios'

  import { mapActions } from 'vuex'

  export default {
    name: 'otp-disable',

    data () {
      return {
        otp: {
          image: null
        },

        form: {
          opt: ''
        }
      }
    },

    methods: {
      ...mapActions({
        attempt: 'auth/attempt'
      }),

      async getOtpImage () {
        let response = await axios.get('auth/otp')

        this.otp.image = response.data
      },

      async submit () {
        try {
          await axios.post('auth/otp', this.form)
          await this.attempt()

          this.$router.push({
            name: 'settings'
          })
        } catch (e) {
          //
        }
      }
    },

    mounted () {
      this.getOtpImage()
    }
  }
</script>
