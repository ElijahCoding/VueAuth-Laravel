<template>
  <div>
    <template v-if="otp.prompt">
      <form @submit.prevent="submit">
        <div>
          <label for="otp">
              Authenticator code
          </label>
          <input type="text" name="otp" id="otp" v-model="form.otp">
        </div>

        <div>
          <input type="submit" value="Validate">
        </div>
      </form>
    </template>
    <template v-else>
      <form @submit.prevent="submit">
        <div>
          <label for="email">
            Email address
          </label>
          <input type="text" name="email" id="email" v-model="form.email">
        </div>

        <div>
          <label for="password">
            Password
          </label>
          <input type="password" name="password" id="password" v-model="form.password">
        </div>

      <div>
        <input type="submit" value="Sign in">
      </div>
    </form>
    </template>
  </div>
</template>

<script>
  import { mapActions } from 'vuex'

  export default {
    name: 'signin',

    data () {
      return {
        otp: {
          prompt: false
        },

        form: {
          email: '',
          password: '',
          otp: '',
        }
      }
    },

    methods: {
      ...mapActions({
        signIn: 'auth/signIn'
      }),

      submit () {
        this.signIn(this.form).then(() => {
          this.$router.replace({
            name: 'dashboard'
          })
        }).catch((e) => {
          switch (e.response.data.reason) {
            case 'REQUIRES_OTP':
                this.otp.prompt = true
                break;
          }
        })
      }
    }
  }
</script>
