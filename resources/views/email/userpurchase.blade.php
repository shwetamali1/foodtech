<!-- Subject: Report Purchase Confirmation – [Report Name] -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Report Purchase Confirmation</title>
  <style>
    /* CLIENT-SAFE INLINE-FALLBACKS BELOW (keep styles simple for email clients) */
    body { margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color:#f4f6f8; font-family: Arial, Helvetica, sans-serif; color:#333; }
    table { border-collapse:collapse; }
    img { border:0; display:block; }
    .container { width:100%; max-width:600px; margin:24px auto; background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.08); }
    .header { padding:20px 24px; background: linear-gradient(90deg,#0f6ab4,#0b9bd3); color:#fff; }
    .logo { font-weight:700; font-size:18px; letter-spacing:.2px; }
    .content { padding:24px; }
    h1 { margin:0 0 8px 0; font-size:20px; color:#111; }
    p { margin:10px 0; line-height:1.45; color:#4b5563; }
    .details { width:100%; margin:18px 0; border:1px solid #e6eef6; border-radius:6px; overflow:hidden; }
    .details td { padding:12px 14px; border-bottom:1px dashed #eef6fb; font-size:14px; color:#1f2937; }
    .details tr:last-child td { border-bottom:none; }
    .label { width:38%; background:#f8fbff; font-weight:600; color:#0f1724; }
    .value { width:62%; color:#0b1320; }
    .cta-wrap { text-align:center; margin:20px 0 6px 0; }
    .btn { display:inline-block; padding:12px 20px; background:#FFD21B; color:#000; border-radius:6px; font-weight:600; text-decoration:none; }
    .small { font-size:12px; color:#6b7280; }
    .hr { height:1px; background:#eef2f7; margin:18px 0; border:0; }
    .footer { padding:18px 24px; font-size:13px; color:#8b95a3; background:#fbfdff; text-align:center; }
    @media (max-width:480px) {
      .label, .value { display:block; width:100% !important; }
      .details td { padding:10px; }
    }
  </style>
</head>
<body>
  <center style="width:100%; background-color:#f4f6f8; padding:18px 0;">
    <table class="container" role="presentation" cellpadding="0" cellspacing="0">
      <tr>
        <td class="header" align="left">
          <span class="logo"><img src="https://foodtechmate.com/assets/img/logo-no-background.png" alt="Food Tech Mate" style="width: 246px; max-height: 84px;"></span>
        </td>
      </tr>

      <tr>
        <td class="content">
          <h1>Report Purchase Confirmation</h1>
          <p>Dear <strong>{{ $data->first_name }} {{ $data->last_name }}</strong>,</p>

          <p>Thank you for purchasing the <strong>{{ $data->report_title }}</strong>. Your transaction has been successfully completed. ✅</p>

          <table class="details" role="presentation" cellpadding="0" cellspacing="0" aria-labelledby="purchase-details">
            <tr>
              <td class="label">Report Title</td>
              <td class="value">{{ $data->report_title }}</td>
            </tr>
            <tr>
              <td class="label">Amount Paid</td>
              <td class="value">{{ $data->amount }}</td>
            </tr>
            <tr>
              <td class="label">Purchase Date</td>
              <td class="value">{{ $data->payment_date }}</td>
            </tr>
            <tr>
              <td class="label">Payment Method</td>
              <td class="value">{{ $data->payment_method }}/{{ $data->method }}</td>
            </tr>
            <tr>
              <td class="label">Access</td>
              <td class="value">
               <?php if(!empty($data->uploaded_pdf)) {
                      
                  $filenames = json_decode($data->uploaded_pdf, true);
                  if ($filenames && is_array($filenames)) {
                  foreach($filenames as $file){
                  ?>
                  <a href="https://foodtechmate.com/{{ asset('images/'.$file) }}" class="small" style="color:#0b84d6; text-decoration:underline;">
                    Download your report
                  </a>
                <?php } } } ?>
                
                <!-- if sending as attachment, you can replace the above with: Attached PDF -->
                <div style="margin-top:8px;" class="small">Or find the report attached to this email (if applicable).</div>
              </td>
            </tr>
          </table>

          <div class="cta-wrap">
              <?php if(!empty($data->uploaded_pdf)) {
                      
                  $filenames = json_decode($data->uploaded_pdf, true);
                  if ($filenames && is_array($filenames)) {
                  foreach($filenames as $file){
                  ?>
                  <a href="https://foodtechmate.com/{{ asset('images/'.$file) }}" class="btn" target="_blank" rel="noopener">
                    Download Report
                  </a>
                <?php } } } ?>
          </div>

          <p>If you face any difficulty accessing your report, please contact us at <a href="mailto:prowessbuzz.foodtechmate@gmail.com" style="color:#0b84d6; text-decoration:underline;">Support Email</a> or call <span style="color:#0b84d6;">+91 75885 46837</span>.</p>

          <hr class="hr" />

          <p class="small">Thank you for choosing <strong>[Your Company Name]</strong>. We hope the report helps you — if you enjoyed it, consider visiting our website for more resources:</p>
          <p class="small"><a href="https://foodtechmate.com" style="color:#0b84d6; text-decoration:underline;">Website URL</a></p>
        </td>
      </tr>

      <tr>
        <td class="footer">
          <div style="margin-bottom:6px;">Best regards,<br>Food Tech Mate</div>
          <div class="small"> <a href="https://foodtechmate.com" style="color:#0b84d6; text-decoration:none;">Website URL</a></div>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>
