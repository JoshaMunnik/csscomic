<?php

use App\View\ApplicationView;

/**
 * @var ApplicationView $this
 */

?>
<p>
Effective Date: 1st of December 2025
</p>
<p>
  At CSS Comic, we believe in a "privacy-first" approach to learning. We collect the minimum amount of data necessary
  to provide you with a functional and personalized experience.
</p>
<h3>1. Information We Collect</h3>
<p>
  Because our login is optional, the amount of data we collect depends on how you use the site:
</p>
<ul>
  <li>
    <strong>Guest Users:</strong> If you browse and complete lessons without logging in, we do not collect
    any personally identifiable information (PII). Your progress is not saved to our servers, your progress is only
    saved in the local storage of your browser. You can delete this data at any time via the <em>clear storage</em>
    button at the home page.
  </li>
  <li>
    <strong>Registered Users:</strong> If you choose to create an account, we collect:
    <ul>
      <li>
        <strong>Account Credentials:</strong> Your email address (or the email address of your parent or guardian if
        you are younger than 16), a name and a password.
      </li>
      <li>
        <strong>User-Generated Content:</strong> Any text, notes, or answers you enter within the lessons. This is
        stored in our database so you can access it later from any device.
      </li>
    </ul>
  </li>
</ul>
<h3>2. How We Use Your Data</h3>
<p>
  We use the information we collect solely for the following purposes:
</p>
<ul>
  <li>
    To provide and maintain your account.
  </li>
  <li>
    To store and retrieve your lesson progress and notes.
  </li>
  <li>
    To allow you to pick up where you left off.
  </li>
</ul>
<p>
  We do not sell your data to third parties, and we do not use your lesson entries for advertising or profiling.
</p>
<h3>3. Data Storage and Security</h3>
<p>
  Your data is stored securely in a database on our servers. We implement industry-standard security measures
  to protect your information from unauthorized access. Your password is never stored as plain text, it is only stored
  using strong hashing algorithms.
</p>
<h3>4. Cookies</h3>
<p>
  We use cookies strictly for authentication purposes. If you log in, a cookie helps our server remember who you
  are as you move from one lesson to the next. We do not use tracking or marketing cookies.
</p>
<h3>5. Your Rights and Control</h3>
<p>
  You are in control of your data. At any time, you may:
</p>
<ul>
  <li>
    <strong>Choose not to log in:</strong> You can access all lessons as a guest without providing any data.
  </li>
  <li>
    <strong>Edit or Delete Content:</strong> You can modify or delete the text you’ve entered in any lesson.
  </li>
  <li>
    <strong>Change Your Personal Information:</strong> After being logged in, you can modify your name and
    password from with the <em>edit profile</em> and <em>change password</em> buttons found at the home page.
  </li>
  <li>
    <strong>Delete Your Account:</strong> After being logged in, you can delete your account using the
    <em>delete account</em> button at the home page. Or you can contact us at <?= $this->element('contact_email') ?> to
    request account deletion.
  </li>
</ul>
<h3>6. Third-Party Services</h3>
<p>
  We do not share your data with third-party services, except where required by law or if necessary for the
  basic technical operation of our server (e.g., our hosting provider).
</p>
<h3>7. Changes to This Policy</h3>
<p>
  We may update this policy from time to time. Any changes will be posted on this page with an updated "Effective Date."
</p>
<h3>8. Contact Us</h3>
<p>
  If you have any questions about this Privacy Policy, please contact us at:  <?= $this->element('contact_email') ?>
</p>
