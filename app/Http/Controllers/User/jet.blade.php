
    public function pwithdrawal(Request $request)

    {

        if ($request->action == "Paid") {
            Withdrawal::where('id',$request->id)
            ->update([
                'status' => 'Processed',
            ]);

            $settings=Settings::where('id', '=', '1')->first();

            if ($settings->deduction_option == "AdminApprove") {
            if($withdrawal->user==$user->id){
                User::where('id',$user->id)
                ->update([
                    'roi' => $user->roi - $withdrawal->to_deduct,
                ]);
            }
            $message = "This is to inform you that your withdrawal request of $user->currency$withdrawal->amount have approved and funds have been sent to your selected account";

       Mail::to($user->email)->send(new NewNotification($message, 'Successful Withdrawal', $user->name));


        }
    }
