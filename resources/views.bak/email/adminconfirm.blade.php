<!-- Subject: New Report Purchased – [User Name] -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>New {{ $data->payment_plan }} Purchased</title>
  <style>
    body { margin:0; padding:0; background:#f4f6f8; font-family:Arial, Helvetica, sans-serif; color:#333; }
    table { border-collapse:collapse; width:100%; }
    .container { max-width:600px; margin:24px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.08); }
    .header { padding:20px 24px; background:linear-gradient(90deg,#374151,#6b7280); color:#fff; }
    .logo { font-size:18px; font-weight:700; }
    .content { padding:24px; }
    h1 { margin:0 0 12px; font-size:20px; color:#111; }
    p { margin:10px 0; line-height:1.45; color:#444; }
    .details { margin:18px 0; border:1px solid #e5e7eb; border-radius:6px; overflow:hidden; }
    .details td { padding:12px 14px; border-bottom:1px solid #f3f4f6; font-size:14px; }
    .details tr:last-child td { border-bottom:none; }
    .label { width:40%; font-weight:600; background:#f9fafb; color:#111827; }
    .value { width:60%; color:#1f2937; }
    .footer { padding:18px 24px; background:#f9fafb; font-size:13px; color:#6b7280; text-align:center; }
    @media(max-width:480px){
      .label,.value{display:block;width:100%!important}
      .details td{padding:10px}
    }
  </style>
</head>
<body>
  <center style="width:100%; background:#f4f6f8; padding:18px 0;">
    <table class="container">
      <tr>
        <td class="header">
          <div class="logo"><img src="https://foodtechmate.com/public/assets/img/logo-no-background.png" alt="Food Tech Mate" style="width: 246px; max-height: 84px;"></div>
        </td>
      </tr>
      <tr>
        <td class="content">
          <h1>New Report Purchased</h1>
          <p>Hello Team,</p>
          <?php if(!empty($data->subscription_name)) { $plan = $data->subscription_name; } else{ $plan = $data->report_title; } ?>
          <p>A {{ $data->payment_plan }} has been purchased. Below are the details:</p>

          <table class="details" role="presentation" cellpadding="0" cellspacing="0">
            <tr>
              <td class="label">User Name</td>
              <td class="value">{{ $data->first_name }} {{ $data->last_name }}</td>
            </tr>
            <tr>
              <td class="label">Email</td>
              <td class="value">{{ $data->email }}</td>
            </tr>
            <tr>
              <td class="label">Mobile Number</td>
              <td class="value">{{ $data->mobile }}</td>
            </tr>
            <tr>
              <td class="label">{{ $data->payment_plan }} Purchased</td>
              <td class="value"><?php echo $plan ?></td>
            </tr>
            <tr>
              <td class="label">Amount Paid</td>
              <td class="value">{{ $data->amount }}</td>
            </tr>
            <tr>
              <td class="label">Payment Method</td>
              <td class="value">{{ $data->payment_method }}/{{ $data->method }}</td>
            </tr>
            <tr>
              <td class="label">Date &amp; Time</td>
              <td class="value">{{ $data->payment_date }}</td>
            </tr>
          </table>

          <p>Please ensure timely delivery/access to the report and maintain records accordingly.</p>
          <p>Thanks,<br>System Notification – <strong>Food Tech Mate</strong></p>
        </td>
      </tr>
      <tr>
        <td class="footer">
          This is an automated notification. Please do not reply to this email.
        </td>
      </tr>
    </table>
  </center>
</body>
</html>
