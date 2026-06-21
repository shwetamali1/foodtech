<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Welcome to Food Tech Mate</title>
  <style>
    body { margin:0; padding:0; background:#f4f6f8; font-family:Arial, Helvetica, sans-serif; color:#333; }
    table { border-collapse:collapse; width:100%; }
    .container { max-width:600px; margin:24px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.08); }
    .header { padding:20px 24px; background:linear-gradient(90deg,#0f6ab4,#0b9bd3); color:#fff; }
    .content { padding:28px 24px; }
    h1 { margin:0 0 10px; font-size:22px; color:#111; }
    p { margin:10px 0; line-height:1.5; color:#4b5563; }
    .details { margin:18px 0; border:1px solid #e5e7eb; border-radius:6px; overflow:hidden; }
    .details td { padding:12px 14px; border-bottom:1px solid #f3f4f6; font-size:14px; }
    .details tr:last-child td { border-bottom:none; }
    .label { width:35%; font-weight:600; background:#f9fafb; color:#111827; }
    .value { width:65%; color:#1f2937; }
    .cta { text-align:center; margin:24px 0 10px; }
    .btn { display:inline-block; padding:12px 24px; background:#FFD21B; color:#000; border-radius:6px; font-weight:700; text-decoration:none; }
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
          <img src="https://foodtechmate.com/assets/img/logo-no-background.png" alt="Food Tech Mate" style="width:220px; max-height:80px;">
        </td>
      </tr>
      <tr>
        <td class="content">
          <h1>Welcome to Food Tech Mate!</h1>
          <p>Dear <strong>{{ $data['first_name'] }} {{ $data['last_name'] }}</strong>,</p>
          <p>Your account has been successfully created. Here are your registration details:</p>

          <table class="details" role="presentation" cellpadding="0" cellspacing="0">
            <tr>
              <td class="label">Name</td>
              <td class="value">{{ $data['first_name'] }} {{ $data['last_name'] }}</td>
            </tr>
            <tr>
              <td class="label">Email</td>
              <td class="value">{{ $data['email'] }}</td>
            </tr>
            <tr>
              <td class="label">Mobile</td>
              <td class="value">{{ $data['mobile'] }}</td>
            </tr>
          </table>

          <p>You can now log in to your account and explore our reports and subscription plans.</p>

          <div class="cta">
            <a href="https://foodtechmate.com/login" class="btn" target="_blank" rel="noopener">Login to Your Account</a>
          </div>

          <p>If you have any questions, please contact us at
            <a href="mailto:malishweta7434@gmail.com" style="color:#0b84d6; text-decoration:underline;">malishweta7434@gmail.com</a>
            or call <span style="color:#0b84d6;">+91 75885 46837</span>.
          </p>
        </td>
      </tr>
      <tr>
        <td class="footer">
          Best regards,<br>Food Tech Mate<br>
          <a href="https://foodtechmate.com" style="color:#0b84d6; text-decoration:none;">foodtechmate.com</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>
