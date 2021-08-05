<?php /** * CakePHP(tm) : Rapid Development Framework (https://cakephp.org) * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org) * * Licensed under The MIT License * For full copyright and license information, please see the LICENSE.txt * Redistributions of files must retain the above copyright notice. * * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org) * @link https://cakephp.org CakePHP(tm) Project * @since 0.10.0 * @license https://opensource.org/licenses/mit-license.php MIT License */ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Email</title>
    <style type="text/css">
        p {
            margin: 10px 0;
            padding: 0;
        }
        
        table {
            border-collapse: collapse;
        }
        
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            display: block;
            margin: 0;
            padding: 0;
        }
        
        img,
        a img {
            border: 0;
            height: auto;
            outline: none;
            text-decoration: none;
        }
        /* new css start */
        
        table.mcnImageContentContainer h1 {
            color: #fff;
            font-size: 31px;
        }
        
        .signup-btn {
            background-color: #8e43e7;
            border: none;
            padding: 3% 7%;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            border-radius: 4px;
        }
        
        .signup-btn:hover {
            color: #000;
            transition: 0.3s;
        }
        
        .signup-linebreak {
            content: "";
            display: block;
            border-top: dotted #c6c6c6 6px;
        }
        
        .signup-footer {
            background-color: #8e43e7;
        }
        
        .ques-footer {
            line-height: 2;
        }
        
        .ques-footer a {
            color: #ffff;
            text-decoration: none;
        }
        
        a.email-footer-icon i {
            color: #A9A9A9;
            font-size: 26px;
        }
        /* new css  end */
        
        body,
        #bodyTable,
        #bodyCell {
            height: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
            font-family: 'Source Sans Pro', sans-serif;
        }
        
        .mcnPreviewText {
            display: none !important;
        }
        
        #outlook a {
            padding: 0;
        }
        
        img {
            -ms-interpolation-mode: bicubic;
        }
        
        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        
        .ReadMsgBody {
            width: 100%;
        }
        
        .ExternalClass {
            width: 100%;
        }
        
        p,
        a,
        li,
        td,
        blockquote {
            mso-line-height-rule: exactly;
        }
        
        a[href^=tel],
        a[href^=sms] {
            color: inherit;
            cursor: default;
            text-decoration: none;
        }
        
        p,
        a,
        li,
        td,
        body,
        table,
        blockquote {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass td,
        .ExternalClass div,
        .ExternalClass span,
        .ExternalClass font {
            line-height: 100%;
        }
        
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        
        .templateContainer {
            max-width: 600px !important;
        }
        
        a.mcnButton {
            display: block;
        }
        
        .mcnImage,
        .mcnRetinaImage {
            vertical-align: bottom;
        }
        
        .mcnTextContent {
            word-break: break-word;
        }
        
        .mcnTextContent img {
            height: auto !important;
        }
        
        .mcnDividerBlock {
            table-layout: fixed !important;
        }
        /*
         @tab Page
         @section Background Style
         @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
         */
        
        body,
        #bodyTable {
            /* background-color: #FAFAFA; */
        }
        /*
         @tab Page
         @section Background Style
         @tip Set the background color and top border for your email. You may want to choose colors that match your company's branding.
         */
        
        #bodyCell {
            border-top: 0;
        }
        /*
         @tab Page
         @section Heading 1
         @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
         @style heading 1
         */
        
        h1 {
            color: #202020;
            font-family: Helvetica;
            font-size: 26px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }
        /*
         @tab Page
         @section Heading 2
         @tip Set the styling for all second-level headings in your emails.
         @style heading 2
         */
        
        h2 {
            color: #202020;
            font-family: Helvetica;
            font-size: 22px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }
        /*
         @tab Page
         @section Heading 3
         @tip Set the styling for all third-level headings in your emails.
         @style heading 3
         */
        
        h3 {
            color: #202020;
            font-family: Helvetica;
            font-size: 20px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }
        /*
         @tab Page
         @section Heading 4
         @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
         @style heading 4
         */
        
        h4 {
            color: #202020;
            font-family: Helvetica;
            font-size: 18px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }
        /*
         @tab Preheader
         @section Preheader Style
         @tip Set the background color and borders for your email's preheader area.
         */
        
        #templatePreheader {
            background-color: #FAFAFA;
            background-image: none;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-top: 0;
            border-bottom: 0;
            /* padding-top: 9px; */
            padding-bottom: 9px;
        }
        /*
         @tab Preheader
         @section Preheader Text
         @tip Set the styling for your email's preheader text. Choose a size and color that is easy to read.
         */
        
        #templatePreheader .mcnTextContent,
        #templatePreheader .mcnTextContent p {
            color: #656565;
            font-size: 12px;
            line-height: 150%;
            text-align: left;
        }
        /*
         @tab Preheader
         @section Preheader Link
         @tip Set the styling for your email's preheader links. Choose a color that helps them stand out from your text.
         */
        
        #templatePreheader .mcnTextContent a,
        #templatePreheader .mcnTextContent p a {
            color: #656565;
            font-weight: normal;
            text-decoration: underline;
        }
        /*
         @tab Header
         @section Header Style
         @tip Set the background color and borders for your email's header area.
         */
        
        #templateHeader {
            background-color: #FFFFFF;
            background-image: none;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-top: 0;
            border-bottom: 0;
            padding-bottom: 0;
        }
        /*
         @tab Header
         @section Header Text
         @tip Set the styling for your email's header text. Choose a size and color that is easy to read.
         */
        
        #templateHeader .mcnTextContent,
        #templateHeader .mcnTextContent p {
            color: #202020;
            font-family: Helvetica;
            font-size: 16px;
            line-height: 150%;
            text-align: left;
        }
        /*
         @tab Header
         @section Header Link
         @tip Set the styling for your email's header links. Choose a color that helps them stand out from your text.
         */
        
        #templateHeader .mcnTextContent a,
        #templateHeader .mcnTextContent p a {
            color: #007C89;
            font-weight: normal;
            text-decoration: underline;
        }
        /*
         @tab Body
         @section Body Style
         @tip Set the background color and borders for your email's body area.
         */
        
        #templateBody {
            background-color: #FFFFFF;
            background-image: none;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-top: 0;
            border-bottom: 0;
            padding-top: 9px;
        }
        /*
         @tab Body
         @section Body Text
         @tip Set the styling for your email's body text. Choose a size and color that is easy to read.
         */
        
        #templateBody .mcnTextContent,
        #templateBody .mcnTextContent p {
            color: #202020;
            font-family: Helvetica;
            font-size: 16px;
            line-height: 150%;
            text-align: left;
        }
        /*
         @tab Body
         @section Body Link
         @tip Set the styling for your email's body links. Choose a color that helps them stand out from your text.
         */
        
        #templateBody .mcnTextContent a,
        #templateBody .mcnTextContent p a {
            font-weight: normal;
            text-decoration: underline;
        }
        /*
         @tab Footer
         @section Footer Style
         @tip Set the background color and borders for your email's footer area.
         */
        
        #templateFooter {
            background-image: none;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-top: 0;
            border-bottom: 0;
            /* padding-bottom: 9px; */
        }
        /*
         @tab Footer
         @section Footer Text
         @tip Set the styling for your email's footer text. Choose a size and color that is easy to read.
         */
        
        #templateFooter .mcnTextContent,
        #templateFooter .mcnTextContent p {
            color: #656565;
            font-family: Helvetica;
            font-size: 12px;
            line-height: 150%;
            text-align: center;
        }
        /*
         @tab Footer
         @section Footer Link
         @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
         */
        
        #templateFooter .mcnTextContent a,
        #templateFooter .mcnTextContent p a {
            color: #656565;
            font-weight: normal;
            text-decoration: underline;
        }
        
        @media only screen and (min-width:768px) {
            .templateContainer {
                width: 600px !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            body,
            table,
            td,
            p,
            a,
            li,
            blockquote {
                -webkit-text-size-adjust: none !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            body {
                width: 100% !important;
                min-width: 100% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnRetinaImage {
                max-width: 100% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnImage {
                width: 100% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnCartContainer,
            .mcnCaptionTopContent,
            .mcnRecContentContainer,
            .mcnCaptionBottomContent,
            .mcnTextContentContainer,
            .mcnBoxedTextContentContainer,
            .mcnImageGroupContentContainer,
            .mcnCaptionLeftTextContentContainer,
            .mcnCaptionRightTextContentContainer,
            .mcnCaptionLeftImageContentContainer,
            .mcnCaptionRightImageContentContainer,
            .mcnImageCardLeftTextContentContainer,
            .mcnImageCardRightTextContentContainer,
            .mcnImageCardLeftImageContentContainer,
            .mcnImageCardRightImageContentContainer {
                max-width: 100% !important;
                width: 100% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnBoxedTextContentContainer {
                min-width: 100% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnImageGroupContent {
                padding: 9px !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnCaptionLeftContentOuter .mcnTextContent,
            .mcnCaptionRightContentOuter .mcnTextContent {
                padding-top: 9px !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnImageCardTopImageContent,
            .mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,
            .mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent {
                padding-top: 18px !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnImageCardBottomImageContent {
                padding-bottom: 9px !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnImageGroupBlockInner {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnImageGroupBlockOuter {
                padding-top: 9px !important;
                padding-bottom: 9px !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnTextContent,
            .mcnBoxedTextContentColumn {
                padding-right: 18px !important;
                padding-left: 18px !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcnImageCardLeftImageContent,
            .mcnImageCardRightImageContent {
                padding-right: 18px !important;
                padding-bottom: 0 !important;
                padding-left: 18px !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            .mcpreview-image-uploader {
                display: none !important;
                width: 100% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            /*
         @tab Mobile Styles
         @section Heading 1
         @tip Make the first-level headings larger in size for better readability on small screens.
         */
            h1 {
                font-size: 22px !important;
                line-height: 125% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            /*
         @tab Mobile Styles
         @section Heading 2
         @tip Make the second-level headings larger in size for better readability on small screens.
         */
            h2 {
                font-size: 20px !important;
                line-height: 125% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            /*
         @tab Mobile Styles
         @section Heading 3
         @tip Make the third-level headings larger in size for better readability on small screens.
         */
            h3 {
                font-size: 18px !important;
                line-height: 125% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            /*
         @tab Mobile Styles
         @section Heading 4
         @tip Make the fourth-level headings larger in size for better readability on small screens.
         */
            h4 {
                font-size: 16px !important;
                line-height: 150% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            /*
         @tab Mobile Styles
         @section Boxed Text
         @tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
         */
            .mcnBoxedTextContentContainer .mcnTextContent,
            .mcnBoxedTextContentContainer .mcnTextContent p {
                font-size: 14px !important;
                line-height: 150% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            /*
         @tab Mobile Styles
         @section Preheader Visibility
         @tip Set the visibility of the email's preheader on small screens. You can hide it to save space.
         */
            #templatePreheader {
                display: block !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            /*
         @tab Mobile Styles
         @section Preheader Text
         @tip Make the preheader text larger in size for better readability on small screens.
         */
            #templatePreheader .mcnTextContent,
            #templatePreheader .mcnTextContent p {
                font-size: 14px !important;
                line-height: 150% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            /*
         @tab Mobile Styles
         @section Header Text
         @tip Make the header text larger in size for better readability on small screens.
         */
            #templateHeader .mcnTextContent,
            #templateHeader .mcnTextContent p {
                font-size: 16px !important;
                line-height: 150% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            /*
         @tab Mobile Styles
         @section Body Text
         @tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
         */
            #templateBody .mcnTextContent,
            #templateBody .mcnTextContent p {
                font-size: 16px !important;
                line-height: 150% !important;
            }
        }
        
        @media only screen and (max-width: 480px) {
            /*
         @tab Mobile Styles
         @section Footer Text
         @tip Make the footer content text larger in size for better readability on small screens.
         */
            #templateFooter .mcnTextContent,
            #templateFooter .mcnTextContent p {
                font-size: 14px !important;
                line-height: 150% !important;
            }
        }
    </style>
</head>

<body>
    <center>
        <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
            <tbody>
                <tr>
                    <td align="center" valign="top" id="bodyCell">
                        <!-- BEGIN  // -->
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" id="templatePreheader">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" class="preheaderContainer">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                                                            <tbody class="mcnTextBlockOuter">
                                                                <tr>
                                                                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px; text-align: center;">
                                                                                        <a href="https://easifyy.com" target="_blank">
                                                                                            <img src="https://easifyy.com/img/logo.png" width="200px" alt="">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" id="templateHeader">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #8e43e7;" class="templateContainer">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" class="headerContainer">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
                                                            <tbody class="mcnImageBlockOuter">
                                                                <tr>
                                                                    <td valign="top" style="padding:13px" class="mcnImageBlockInner">
                                                                        <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <h1 style="color:#fff !important">Easifyy</h1>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <?=$this->fetch('content') ?><br><br>
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                                        <tbody>
                                            <tr>
                                                <td valign="top" class="bodyContainer">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                                                        <tbody class="mcnTextBlockOuter">
                                                            <tr>
                                                                <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                                                    <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%; text-align: center;     font-size: 30px;
                                                   color: #fff;
                                                   font-weight: 600;
                                                   background-color: #8e43e7;
                                                   " width="100%" class="mcnTextContentContainer">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <span class="ques-footer">
                                                               <p style="padding-top: 6%;">Questions?</p>
                                                               <p style="padding-bottom: 6%;"><a
                                                                  href="#" style="color: #fff;">Visit Easifyy Help Center
                                                                   <img src="https://easifyy.com/img/email-right-arrow.png" width="1%" alt=""></a>
                                                               </p>
                                                            </span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                    </td>
                </tr>
                <!-- icons start -->
                <tr>
                    <td align="center" valign="top" id="templateFooter">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tbody>
                                <tr>
                                    <td valign="top" class="footerContainer">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowBlock" style="min-width:100%;background: #d3baf129;">
                                            <tbody class="mcnFollowBlockOuter">
                                                <tr>
                                                    <!-- start -->
                                                    <td align="center" valign="top" style="padding:9px" class="mcnFollowBlockInner">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentContainer" style="min-width:100%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" style="padding-left:9px;padding-right:9px;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnFollowContent">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" valign="top" style="padding-top:9px; padding-right:9px; padding-left:9px;">
                                                                                        <table align="center" border="0" cellpadding="0" cellspacing="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center" valign="top">
                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" class="mcnFollowContentItemContainer">
                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
                                                                                                                            <tbody>
                                                                                                                                <tr>
                                                                                                                                    <td align="left" valign="middle" style="padding-top:5px; padding-right:10px;  padding-left:9px;">
                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="">
                                                                                                                                            <tbody>
                                                                                                                                                <tr>
                                                                                                                                                    <td align="center" valign="middle" width="24" class="mcnFollowIconContent">
                                                                                                                                                        <a class="email-footer-icon" href="http://www.twitter.com/" target="_blank"><img src="https://easifyy.com/img/email-twitter.png" width="22px" alt="twitter"></a>
                                                                                                                                                    </td>
                                                                                                                                                </tr>
                                                                                                                                            </tbody>
                                                                                                                                        </table>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" class="mcnFollowContentItemContainer">
                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
                                                                                                                            <tbody>
                                                                                                                                <tr>
                                                                                                                                    <td align="left" valign="middle" style="padding-top:5px; padding-right:10px;  padding-left:9px;">
                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="">
                                                                                                                                            <tbody>
                                                                                                                                                <tr>
                                                                                                                                                    <td align="center" valign="middle" width="24" class="mcnFollowIconContent">
                                                                                                                                                        <a class="email-footer-icon" href="http://www.facebook.com" target="_blank"><img src="https://easifyy.com/img/email-facebook.png" width="22px" alt="facebook"></a>
                                                                                                                                                    </td>
                                                                                                                                                </tr>
                                                                                                                                            </tbody>
                                                                                                                                        </table>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="padding-right:0;" class="mcnFollowContentItemContainer">
                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
                                                                                                                            <tbody>
                                                                                                                                <tr>
                                                                                                                                    <td align="left" valign="middle" style="padding-top:5px; padding-right:10px;  padding-left:9px;">
                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="">
                                                                                                                                            <tbody>
                                                                                                                                                <tr>
                                                                                                                                                    <td align="center" valign="middle" width="24" class="mcnFollowIconContent">
                                                                                                                                                        <a class="email-footer-icon" href="http://mailchimp.com" target="_blank"><img src="https://easifyy.com/img/email-linkedin.png" width="22px" alt="linkedin"></i>
                                                                                                                                                        </a>
                                                                                                                                                    </td>
                                                                                                                                                </tr>
                                                                                                                                            </tbody>
                                                                                                                                        </table>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="padding-right:0; " class="mcnFollowContentItemContainer">
                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
                                                                                                                            <tbody>
                                                                                                                                <tr>
                                                                                                                                    <td align="left" valign="middle" style="padding-top:5px; padding-right:10px;  padding-left:9px;">
                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="">
                                                                                                                                            <tbody>
                                                                                                                                                <tr>
                                                                                                                                                    <td align="center" valign="middle" width="24" class="mcnFollowIconContent">
                                                                                                                                                        <a class="email-footer-icon" href="http://mailchimp.com" target="_blank"><img src="https://easifyy.com/img/email-youtube.png" width="22px" alt="youtube"></a>
                                                                                                                                                    </td>
                                                                                                                                                </tr>
                                                                                                                                            </tbody>
                                                                                                                                        </table>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="padding-right:0;" class="mcnFollowContentItemContainer">
                                                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
                                                                                                                            <tbody>
                                                                                                                                <tr>
                                                                                                                                    <td align="left" valign="middle" style="padding-top:5px; padding-right:10px;  padding-left:9px;">
                                                                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="">
                                                                                                                                            <tbody>
                                                                                                                                                <tr>
                                                                                                                                                    <td align="center" valign="middle" width="24" class="mcnFollowIconContent">
                                                                                                                                                        <a class="email-footer-icon" href="http://mailchimp.com" target="_blank"><img src="https://easifyy.com/img/email-instagram.png" width="22px" alt="instagram"></a>
                                                                                                                                                    </td>
                                                                                                                                                </tr>
                                                                                                                                            </tbody>
                                                                                                                                        </table>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                                                                            <tbody class="mcnTextBlockOuter">
                                                                                <tr>
                                                                                    <td valign="top" class="mcnTextBlockInner">
                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%; text-align: center;" width="100%" class="mcnTextContentContainer">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <span style="color: #A9A9A9;font-size: 14px;">
                                                                                             <p>© 2021
                                                                                                Easifyy
                                                                                                All
                                                                                                rights
                                                                                                reserved.
                                                                                             </p>
                                                                                          </span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- end -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" id="templatePreheader">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
                            <tbody>
                                <tr>
                                    <td valign="top" class="preheaderContainer">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                                            <tbody class="mcnTextBlockOuter">
                                                <tr>
                                                    <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px; text-align: center;">
                                                                        <p style="text-align: center; color: #A9A9A9; font-size: 14px;">Visit Easifyy.com
                                                                            <br>New Delhi
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px; text-align: center;">
                                                                        <p style="text-align: center; color: #A9A9A9;">You're receiving this email because you signed up for a easifyy account</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <!-- icons end -->
                </tbody>
                </table>
                <!-- // END  -->
    </center>
</body>

</html>