@extends('layouts.apps')
@section('content')
    <section>
        <div class="max-w-6xl m-auto py-12 px-4 w-full terms">
            <h1 class="text-3xl mb-3 font-semibold">Trade Fountain Terms of Service</h1>
            <p>Last Updated: 10 Oct, 2023</p>

            <p>Welcome to Trade Fountain! These Terms of Service ("Terms") govern your use of the Trade Fountain website ("Site") and the services provided by Trade Fountain ("Services"). By accessing or using our Site and Services, you agree to be bound by these Terms. If you do not agree to these Terms, please do not use our Site or Services.</p>

            <h2>1. Acceptance of Terms</h2>

            <p>By accessing or using the Site and Services, you agree to comply with and be bound by these Terms. If you do not agree to these Terms, you may not use the Site or Services.</p>

            <h2>2. User Account</h2>

            <p>2.1 To access certain features of the Site, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update such information to keep it accurate, current, and complete.</p>

            <p>2.2 You are responsible for maintaining the confidentiality of your account and password and for restricting access to your computer. You agree to accept responsibility for all activities that occur under your account or password.</p>

            <h2>3. Use of Services</h2>
            <ul>
                <li>3.1 You agree to use the Services only for lawful purposes and in accordance with these Terms.</li>
                <li>3.2 The Services may only be used by individuals who are 18 years or older.</li>

                <li>3.3 You may only use the Services for personal, non-commercial purposes.</li>
            </ul>

            <h2>4. Payments</h2>

            <p>4.1 Payment for goods and services on Trade Fountain is processed through Stripe. By using our Services, you agree to be bound by Stripe's terms and conditions, which can be found on the Stripe website.</p>

            <h2>5. Privacy Policy</h2>

            <p>5.1 Your use of the Site and Services is also governed by our Privacy Policy, which can be <a rel="nofollow" href="{{ route('policy') }}" class="font-semibold text-blue-600 underline">found here</a>. By using the Site and Services, you consent to the terms of the Privacy Policy.</p>

            <h2>6. Termination</h2>

            <p>6.1 Trade Fountain reserves the right to terminate or suspend your account and access to the Services at any time and for any reason, without notice.</p>

            <h2>7. Changes to Terms</h2>

            <p>7.1 Trade Fountain reserves the right to change or modify these Terms at any time. It is your responsibility to review these Terms periodically for changes. Your continued use of the Site and Services following the posting of changes will be deemed as your acceptance of those changes.</p>

            <h2>8. Contact Information</h2>

            <p>If you have any questions about these Terms or the Services, please contact us at <span class="font-semibold text-blue-600 underline">contact@tradefountain.co.uk</span> <br> Thank you for using Trade Fountain!</p>
        </div>
</section>
<x-footer />

@endsection