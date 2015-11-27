<?php

namespace OVH\Http\Requests;

use OVH\Http\Requests\Request;

class ShowTicketRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $ticket = $this->route('tickets');
        $user = auth()->user();

        return $user->type === 'admin' || $ticket->user_id === $user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
