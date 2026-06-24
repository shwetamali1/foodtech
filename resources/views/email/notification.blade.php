<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>New Notification – FoodTech Mate</title>
  <style>
    body { margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif; color:#333; }
    table { border-collapse:collapse; }
    .container { width:100%; max-width:600px; margin:24px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.08); }
    .header { padding:20px 24px; background: linear-gradient(90deg,#022B50,#0a4a8a); color:#fff; }
    .logo { font-weight:700; font-size:18px; letter-spacing:.2px; }
    .content { padding:28px 24px; }
    h1 { margin:0 0 10px 0; font-size:20px; color:#111; }
    p { margin:10px 0; line-height:1.6; color:#4b5563; }
    .notification-box {
      background:#f0f6ff;
      border-left:4px solid #022B50;
      border-radius:0 6px 6px 0;
      padding:16px 18px;
      margin:20px 0;
      font-size:15px;
      color:#1f2937;
      line-height:1.6;
    }
    .btn { display:inline-block; padding:12px 24px; background:#022B50; color:#fff; border-radius:6px; font-weight:600; text-decoration:none; margin-top:12px; }
    .hr { height:1px; background:#eef2f7; margin:22px 0; border:0; }
    .footer { padding:16px 24px; font-size:12px; color:#8b95a3; background:#fbfdff; text-align:center; }
    .small { font-size:12px; color:#6b7280; }
  </style>
</head>
<body>
  <center style="width:100%; background-color:#f4f6f8; padding:18px 0;">
    <table class="container" role="presentation" cellpadding="0" cellspacing="0">
      <tr>
        <td class="header" align="left">
          <img src="https://foodtechmate.com/assets/img/logo-no-background.png" alt="FoodTech Mate" style="width:200px; max-height:70px;">
        </td>
      </tr>

      <tr>
        <td class="content">
          <h1>You have a new notification</h1>
          <p>Dear <strong>{{ $name }}</strong>,</p>
          <p>You have received a new notification from the FoodTech Mate team:</p>

          <div class="notification-box">
            {{ $message }}
          </div>

          <p>Please log in to your dashboard to view and manage all your notifications.</p>

          <a href="{{ url('/settings/profiles') }}" class="btn">View in Dashboard</a>

          <hr class="hr">

          <p class="small">If you did not expect this notification or have any concerns, please contact our support team at <a href="mailto:prowessbuzz.foodtechmate@gmail.com" style="color:#022B50;">prowessbuzz.foodtechmate@gmail.com</a>.</p>
        </td>
      </tr>

      <tr>
        <td class="footer">
          <div style="margin-bottom:6px;">Best regards,<br><strong>FoodTech Mate Team</strong></div>
          <div><a href="https://foodtechmate.com" style="color:#022B50; text-decoration:none;">foodtechmate.com</a></div>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>
