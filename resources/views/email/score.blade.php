@extends('email.layout')
@section('layouts')
  <tr><td align="center">
    <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
    <div style="line-height: 44px;">
      <font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
      <span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
        Result of Analytical Writing Assessment (AWA)
      </span></font>
    </div>
    <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
  </td></tr>
  <tr><td align="left">
    <div style="line-height: 24px;">
      <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
        <p style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
          Dear Mr. {{ $session->user->name }},<br/>
          We are glad to inform you that your Analytical Writing Assessment (AWA) Exam held on {{ date('M d, Y - h:i:s A', strtotime( $session->attempt_on )) }} is Sucessfully Checked.
        </p>

      </font>
    </div>
    <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
  </td></tr>
  <tr><td align="center">
    <div style="line-height: 24px;">
      <span style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 20px;">
          Your Score is: {{ $form['score'] }}
      </span>
    </div>
    <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
  </td></tr>
  <tr><td align="left">
    <div style="line-height: 24px;">
      <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
        <p style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
          Thanks with regard<br/>
          EduShastra IT Team
        </p>

      </font>
    </div>
    <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
  </td></tr>
@endsection
