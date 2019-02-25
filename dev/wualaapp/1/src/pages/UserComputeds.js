export default {
  computed: {
    // user_id: { get(){ return this.Store.state.user.user_id }, set (value) {this.$store.commit('user/user_id', value); this.$v.user_id.$touch() } },
    user_id: { get () { return this.$store.state.user.user_id }, set (value) { this.$store.commit('user/user_id', value) } },
    user_username: { get () { return this.$store.state.user.user_username }, set (value) { this.$store.commit('user/user_username', value) } },
    user_password: { get () { return this.$store.state.user.user_password }, set (value) { this.$store.commit('user/user_password', value) } },
    user_first_name: { get () { return this.$store.state.user.user_first_name }, set (value) { this.$store.commit('user/user_first_name', value) } },
    user_last_name: { get () { return this.$store.state.user.user_last_name }, set (value) { this.$store.commit('user/user_last_name', value) } },
    user_address_line_one: { get () { return this.$store.state.user.user_address_line_one }, set (value) { this.$store.commit('user/user_address_line_one', value) } },
    user_address_line_two: { get () { return this.$store.state.user.user_address_line_two }, set (value) { this.$store.commit('user/user_address_line_two', value) } },
    user_city: { get () { return this.$store.state.user.user_city }, set (value) { this.$store.commit('user/user_city', value) } },
    user_state: { get () { return this.$store.state.user.user_state }, set (value) { this.$store.commit('user/user_state', value) } },
    user_zip: { get () { return this.$store.state.user.user_zip }, set (value) { this.$store.commit('user/user_zip', value) } },
    user_email: { get () { return this.$store.state.user.user_email }, set (value) { this.$store.commit('user/user_email', value) } },
    user_mobile_number: { get () { return this.$store.state.user.user_mobile_number }, set (value) { this.$store.commit('user/user_mobile_number', value) } },
    user_home_number: { get () { return this.$store.state.user.user_home_number }, set (value) { this.$store.commit('user/user_home_number', value) } },
    user_birthday: { get () { return this.$store.state.user.user_birthday }, set (value) { this.$store.commit('user/user_birthday', value) } },
    user_washer: { get () { return this.$store.state.user.user_washer }, set (value) { this.$store.commit('user/user_washer', value) } },
    user_active: { get () { return this.$store.state.user.user_active }, set (value) { this.$store.commit('user/user_active', value) } },
    user_password_last_updated: { get () { return this.$store.state.user.user_password_last_updated }, set (value) { this.$store.commit('user/user_password_last_updated', value) } },
    user_password_last_updated_by: { get () { return this.$store.state.user.user_password_last_updated_by }, set (value) { this.$store.commit('user/user_password_last_updated_by', value) } },
    user_password_reset: { get () { return this.$store.state.user.user_password_reset }, set (value) { this.$store.commit('user/user_password_reset', value) } },
    user_driver: { get () { return this.$store.state.user.user_driver }, set (value) { this.$store.commit('user/user_driver', value) } },
    user_pro: { get () { return this.$store.state.user.user_pro }, set (value) { this.$store.commit('user/user_pro', value) } },
    user_premium: { get () { return this.$store.state.user.user_premium }, set (value) { this.$store.commit('user/user_premium', value) } },
    user_admin: { get () { return this.$store.state.user.user_admin }, set (value) { this.$store.commit('user/user_admin', value) } }
  }
}
