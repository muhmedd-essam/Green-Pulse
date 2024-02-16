<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Http\Requests\registerUsersRequest;
use App\Http\Requests\loginUsersRequest;

use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(registerUsersRequest $request){
        // if ($request->fails()) {
        //     return response()->json(['errors' => $request->errors()], 422);
        // }


            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->about = $request->input('about');
            $user->birthdate = $request->input('birthdate');
            // $user->age = $request->input('age');
            $user->password = bcrypt($request->input('password'));
            $user->intersts = is_array($request->input('intersts')) ? implode(',', $request->input('intersts')) : $request->input('intersts');
            $user->phone = $request->input('phone');
            $user->career = $request->input('career');
            $user->country = $request->input('country');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('images');
                $user->image = $filePath;
            }

            $user->save();

            return response()->json(['message' => 'done registration', 'data'=>$user]);

    }
    public function login(loginUsersRequest $request)
    {

        $token = JWTAuth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        if(!empty($token)){
            $user =User::where('email', $request->email)->first();

            return response()->json([
                "status" => true,
                "message" => "User logged in succcessfully",
                "token" => [$token, $user]
            ]);
        }

        return response()->json([
            "status" => false,
            "message" => "Invalid details"
        ]);
    }

    public function options(){
        $careers = [
            'Engineering', 'Medicine', 'Computer Science', 'Mathematics', 'Psychology', 'Economics', 'Law', 'Chemistry', 'Business', 'Dentistry', 'Nursing',
            'Life Sciences', 'Public Health', 'Veterinary', 'Pharmacy', 'Clinical Medicine', 'Biotechnology', 'International Relations'
        ];

        $interests = [
            'The Science of Climate Change', 'Impacts of Climate Change', 'Mitigation of Climate Change',
            'Adaptation to Climate Change', 'Climate Change Policy and Governance',
            'Climate Change Communication and Education', 'Climate Change and Society', 'Climate Change and Ethics'
        ];

        $countries = [
            'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia',
            'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium',
            'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria',
            'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada', 'Central African Republic', 'Chad',
            'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czechia', 'Denmark',
            'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea',
            'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana',
            'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland',
            'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan',
            'Kenya', 'Kiribati', 'Korea, North', 'Korea, South', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon',
            'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia',
            'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova',
            'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands',
            'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama',
            'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Palestine', 'Poland', 'Portugal', 'Qatar', 'Romania',
            'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino',
            'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia',
            'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname',
            'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga',
            'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates',
            'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam',
            'Yemen', 'Zambia', 'Zimbabwe'
        ];

        // $optionsTotal=[$interests, $careers, $countries];

        return response()->json(['intersts' => $interests, 'career'=>$careers, 'countries'=>$countries]);
    }
}
