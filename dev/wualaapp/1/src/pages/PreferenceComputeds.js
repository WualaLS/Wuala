export default {
  computed: {
    preferences_hypoallergenic: { get () { return this.$store.state.preferences.preferences_hypoallergenic }, set (value) { this.$store.commit('preferences/preferences_hypoallergenic', value) } },
    preferences_detergent: { get () { return this.$store.state.preferences.preferences_detergent }, set (value) { this.$store.commit('preferences/preferences_detergent', value) } },
    preferences_detergent_other: { get () { return this.$store.state.preferences.preferences_detergent_other }, set (value) { this.$store.commit('preferences/preferences_detergent_other', value) } },
    preferences_dry_heat: { get () { return this.$store.state.preferences.preferences_dry_heat }, set (value) { this.$store.commit('preferences/preferences_dry_heat', value) } },
    preferences_dryer_sheets: { get () { return this.$store.state.preferences.preferences_dryer_sheets }, set (value) { this.$store.commit('preferences/preferences_dryer_sheets', value) } }
  }
}
