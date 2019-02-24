export const user_id = (state, value) => { state.user_id = value}
export const user_username = (state, value) => { state.user_username = value}
export const user_password = (state, value) => { state.user_password = value}
export const user_first_name = (state, value) => { state.user_first_name = value}
export const user_last_name = (state, value) => { state.user_last_name = value}
export const user_address_line_one = (state, value) => { state.user_address_line_one = value}
export const user_address_line_two = (state, value) => { state.user_address_line_two = value}
export const user_city = (state, value) => { state.user_city = value}
export const user_state = (state, value) => { state.user_state = value}
export const user_zip = (state, value) => { state.user_zip = value}
export const user_email = (state, value) => { state.user_email = value}
export const user_mobile_number = (state, value) => { state.user_mobile_number = value}
export const user_home_number = (state, value) => { state.user_home_number = value}
export const user_birthday = (state, value) => { state.user_birthday = value}
export const user_washer = (state, value) => { state.user_washer = value}
export const user_active = (state, value) => { state.user_active = value}
export const user_password_last_updated = (state, value) => { state.user_password_last_updated = value}
export const user_password_last_updated_by = (state, value) => { state.user_password_last_updated_by = value}
export const user_password_reset = (state, value) => { state.user_password_reset = value}

export const setUser = (state, value) => {
	Object.keys(state).forEach((key, index) =>{
		state[key] = null
	})
	Object.keys(state).forEach((key, index) =>{
		state[key] = value[key]
	})
}

export const clearUser = (state, value) => {
	Object.keys(state).forEach((key, index) =>{
		state[key] = null
	})
}
