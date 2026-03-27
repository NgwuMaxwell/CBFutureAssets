# Email System Setup Guide

## Overview

Your Laravel email system has been successfully configured and tested with MailHog for localhost development. This guide provides instructions for both localhost development and production deployment.

## Current Status ✅

- ✅ Email system working with MailHog
- ✅ All route conflicts resolved
- ✅ CKEditor security warning fixed
- ✅ Route caching enabled
- ✅ Multiple email types tested and working

## Localhost Setup (MailHog)

### 1. Install MailHog

**Option A: Download Binary**
- Download from: https://github.com/mailhog/MailHog/releases
- Extract and run: `MailHog.exe` (Windows)

**Option B: Docker**
```bash
docker run -d -p 1025:1025 -p 8025:8025 mailhog/mailhog
```

**Option C: Package Manager**
```bash
# Windows (using Chocolatey)
choco install mailhog

# macOS (using Homebrew)
brew install mailhog
```

### 2. Start MailHog
```bash
# If using binary
./MailHog

# If using Docker (already running)
# No action needed

# If using package manager
mailhog
```

### 3. Access MailHog Web Interface
- Open browser and go to: http://localhost:8025
- This is where you'll see all captured emails during development

### 4. Current .env Configuration (Working)
```env
MAIL_MAILER=smtp
MAIL_HOST=localhost
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=support@maxtekdigital.com
MAIL_FROM_NAME="Maxtek Digital"
```

## Production Deployment

### 1. Update .env for Production

Replace the MailHog settings with your hosting provider's SMTP credentials:

```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host.com
MAIL_PORT=587
MAIL_USERNAME=your-email@yourdomain.com
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@yourdomain.com
MAIL_FROM_NAME="Your App Name"
```

### 2. Common SMTP Providers

**Gmail/Google Workspace:**
```env
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```
*Note: Use App Passwords for Gmail, not your regular password*

**Outlook/Hotmail:**
```env
MAIL_HOST=smtp-mail.outlook.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```

**Yahoo:**
```env
MAIL_HOST=smtp.mail.yahoo.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```

**AWS SES:**
```env
MAIL_HOST=email-smtp.us-east-1.amazonaws.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```

**Your Hosting Provider:**
Contact your hosting provider for SMTP settings. Common formats:
- Host: mail.yourdomain.com
- Port: 587 (TLS) or 465 (SSL)
- Username: your-email@yourdomain.com

### 3. Security Considerations

**For Gmail:**
1. Enable 2-Factor Authentication
2. Generate App Password: https://support.google.com/accounts/answer/185833
3. Use App Password in MAIL_PASSWORD

**For Other Providers:**
- Use strong, unique passwords
- Consider using environment-specific credentials
- Enable encryption (TLS/SSL)

### 4. Test Production Setup

After updating .env, test your email setup:

```bash
# Clear caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Rebuild caches
php artisan config:cache
php artisan route:cache

# Test email (create a test user or use existing)
php artisan tinker
>>> Mail::raw('Test email', function($message) { $message->to('your-email@domain.com')->subject('Test'); });
```

## Email Types Available

Your application supports multiple email types:

1. **WelcomeEmail** - Sent to new users
2. **DepositStatus** - Deposit confirmations
3. **WithdrawalStatus** - Withdrawal notifications
4. **NewNotification** - General notifications
5. **NewRoi** - Return on investment notifications
6. **TradeExecutedMail** - Trade execution notifications
7. **TradeUpdateMail** - Trade updates
8. **LoanApprovedMail** - Loan approval notifications
9. **LoanRejectedMail** - Loan rejection notifications
10. **BidApprovedMail** - Bid approval notifications
11. **SignalSubscriptionMail** - Signal subscription notifications
12. **AdminPlacedTradeMail** - Admin trade notifications

## Troubleshooting

### Common Issues

**Emails not sending:**
1. Check .env configuration
2. Verify SMTP credentials
3. Check firewall settings
4. Test with different email provider

**Connection timeouts:**
1. Check MAIL_HOST and MAIL_PORT
2. Verify network connectivity
3. Try different MAIL_ENCRYPTION setting

**Authentication errors:**
1. Verify MAIL_USERNAME and MAIL_PASSWORD
2. Check if 2FA is required (use App Passwords)
3. Contact email provider for SMTP settings

**Emails marked as spam:**
1. Configure SPF/DKIM records
2. Use domain-based email addresses
3. Avoid spam trigger words in subject/content

### Debug Commands

```bash
# Check mail configuration
php artisan tinker
>>> config('mail')

# Test SMTP connection
telnet your-smtp-host.com 587

# Check logs
tail -f storage/logs/laravel.log
```

## Files Modified

The following files were updated during setup:

1. **routes/admin/web.php** - Fixed route name conflicts
2. **routes/user/web.php** - Fixed route name conflicts
3. **resources/views/admin/email/index.blade.php** - Updated CKEditor CDN
4. **resources/views/admin/Settings/FrontendSettings/privacy.blade.php** - Updated CKEditor CDN

## Cleanup

After confirming everything works:

1. Remove test files:
   ```bash
   rm test_email.php
   rm test_email_system.php
   ```

2. Update production .env with real SMTP credentials

3. Test all email functionality in production environment

## Support

If you encounter issues:

1. Check this guide first
2. Review Laravel logs: `storage/logs/laravel.log`
3. Test SMTP connection manually
4. Contact your email provider for SMTP settings

## Next Steps

1. Deploy to production
2. Update .env with production SMTP settings
3. Test email functionality
4. Monitor email delivery
5. Configure email monitoring/alerts if needed