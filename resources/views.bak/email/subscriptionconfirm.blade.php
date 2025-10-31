<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Subscription Purchase Confirmation</title>
  <style>
    body { margin:0; padding:0; background:#f4f6f8; font-family:Arial, Helvetica, sans-serif; color:#333; }
    table { border-collapse:collapse; width:100%; }
    .container { max-width:600px; margin:24px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.08); }
    .header { padding:20px 24px; background:linear-gradient(90deg,#2563eb,#0ea5e9); color:#fff; }
    .logo { font-size:18px; font-weight:700; }
    .content { padding:24px; }
    h1 { margin:0 0 12px; font-size:20px; color:#111; }
    p { margin:10px 0; line-height:1.45; color:#444; }
    .details { margin:18px 0; border:1px solid #e5e7eb; border-radius:6px; overflow:hidden; }
    .details td { padding:12px 14px; border-bottom:1px solid #f3f4f6; font-size:14px; }
    .details tr:last-child td { border-bottom:none; }
    .label { width:35%; font-weight:600; background:#f9fafb; color:#111827; }
    .value { width:65%; color:#1f2937; }
    .cta { text-align:center; margin:22px 0 10px; }
    .btn { display:inline-block; padding:12px 20px; background:#FFD21B; color:#000; border-radius:6px; font-weight:600; text-decoration:none; }
    .small { font-size:12px; color:#6b7280; }
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
          <h1>Subscription Purchase Confirmation</h1>
          <p>Dear <strong>{{ $data->first_name }} {{ $data->last_name }}</strong>,</p>
          <p>Thank you for purchasing the <strong>{{ $data->subscription_name }}</strong> subscription with us. 🎉</p>

          <table class="details" role="presentation" cellpadding="0" cellspacing="0">
            <tr>
              <td class="label">Plan</td>
              <td class="value">{{ $data->subscription_name }}</td>
            </tr>
            <tr>
              <td class="label">Amount Paid</td>
              <td class="value">{{ $data->amount }}</td>
            </tr>
            <tr>
              <td class="label">Payment Method</td>
              <td class="value">{{ $data->payment_method }}/{{ $data->method }}</td>
            </tr>
          </table>

          <p>We’re excited to have you onboard. You will start receiving all the benefits of your plan immediately.</p>

          <div class="cta">
            <a href="https://foodtechmate.com/login" class="btn" target="_blank" rel="noopener">Go to Dashboard</a>
          </div>

          <p>If you have any queries, please contact us at 
            <a href="mailto:prowessbuzz.foodtechmate@gmail.com" style="color:#2563eb; text-decoration:underline;">Support Email</a> 
            or call <span style="color:#2563eb;">+91 75885 46837</span>.
          </p>
        </td>
      </tr>
      <tr>
        <td class="footer">
          Best regards,<br>Food Tech Mate<br>
          <a href="https://foodtechmate.com" style="color:#2563eb; text-decoration:none;">Food Tech Mate</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>
