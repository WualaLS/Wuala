export const preferences_id = (state, value) => { state.preferences_id = value}
export const preferences_user_id_fk = (state, value) => { state.preferences_user_id_fk = value}
export const preferences_hypoallergenic = (state, value) => { state.preferences_hypoallergenic = value}
export const preferences_detergent = (state, value) => { state.preferences_detergent = value}
export const preferences_detergent_other = (state, value) => { state.preferences_detergent_other = value}
export const preferences_dry_heat = (state, value) => { state.preferences_dry_heat = value}
export const preferences_dryer_sheets = (state, value) => { state.preferences_dryer_sheets = value}

export const setPreferences = (state, value) => {
	Object.keys(state).forEach((key, index) =>{
		state[key] = null
	})
	Object.keys(state).forEach((key, index) =>{
		state[key] = value[key]
	})
}

export const clearPreferences = (state, value) => {
	Object.keys(state).forEach((key, index) =>{
		state[key] = null
	})
}
