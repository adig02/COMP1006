<?php
/*
==========================================
 PHP date() Function Quick Reference
==========================================

 Syntax:
   date(format, timestamp);

 - format = how the date/time should be displayed
 - timestamp = optional Unix timestamp (if omitted, current time is used)

------------------------------------------
📆 Date Components
------------------------------------------
 d   = Day of the month (01–31)
 j   = Day of the month (1–31, no leading zeros)
 D   = Day of the week (Mon, Tue, etc.)
 l   = Full day name (Sunday, Monday, …)
 N   = Day of the week (1 = Monday, 7 = Sunday)
 w   = Numeric day of the week (0 = Sunday, 6 = Saturday)
 z   = Day of the year (0–365)

------------------------------------------
📅 Month
------------------------------------------
 m   = Month number (01–12)
 n   = Month number (1–12, no leading zeros)
 M   = Short month name (Jan, Feb, …)
 F   = Full month name (January, February, …)
 t   = Number of days in the month (28–31)

------------------------------------------
📆 Year
------------------------------------------
 Y   = Full year (2025)
 y   = Two-digit year (25)
 L   = Leap year? (1 if yes, 0 if no)

------------------------------------------
⏰ Time
------------------------------------------
 H   = Hour (00–23)
 h   = Hour (01–12)
 g   = Hour (1–12, no leading zeros)
 i   = Minutes (00–59)
 s   = Seconds (00–59)
 a   = am/pm (lowercase)
 A   = AM/PM (uppercase)

------------------------------------------
🌍 Timezone
------------------------------------------
 e   = Timezone identifier (e.g., UTC, America/New_York)
 T   = Timezone abbreviation (e.g., EST, PDT)
 P   = Difference from GMT (e.g., +02:00)
 O   = Difference from GMT (e.g., +0200)

------------------------------------------
📌 Examples
------------------------------------------
 date("Y-m-d");        // 2025-09-09
 date("d/m/Y");        // 09/09/2025
 date("l, F j, Y");    // Tuesday, September 9, 2025
 date("h:i A");        // 08:15 PM
 date("H:i:s");        // 20:15:45
 date("Y-m-d H:i:s");  // 2025-09-09 20:15:45

------------------------------------------
 Using with a timestamp
------------------------------------------
 $timestamp = strtotime("2025-12-25");
 echo date("l, F j, Y", $timestamp);
 // Thursday, December 25, 2025

*/
?>

