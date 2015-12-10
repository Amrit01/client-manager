<?php

namespace App\Http\Requests;

class StoreClientRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name'    => 'required',
			'gender'  => 'required|in:male,female,other',
			'email'   => 'required|email',
			'phone'   => 'required',
			'address' => 'required',
			'nationality' => 'required',
			'date_of_birth' => 'required',
			'qualification' => 'required',
			'preferred_contact_mode' => 'required|in:email,phone,none',
		];
	}
}
