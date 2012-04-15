<head>
  <title> Index </title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta name="keywords" content="Stories" />
  <link rel="stylesheet" type="text/css" href="general.css" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
  <script type="text/javascript" src="myjquery.js"></script>
</head>

<body>
<div id="container">
<?php
include ("header.php");
include ("navigation.php");
?>
  <div id="forest_content">
    <div id="subnav">
      <?php
        $currID;
        $db = mysql_connect("localhost", "root","philowarlock68");
        mysql_select_db("forest", $db);
        $result = mysql_query("SELECT Name from forest ORDER BY Name");
        while ($row[] = mysql_fetch_array($result));
      ?>
      <script>
        var tags = ["<?php echo join("\", \"", $row); ?>"];
      </script>
      <form method="post">
        <input id="search" type="text" name="search"/>
        <input type="submit" value="Search" />
      </form>
      <div id="subnav2">
        <?php
          $db = mysql_connect("localhost", "root","philowarlock68");
          mysql_select_db("forest", $db);
          $result = mysql_query("SELECT Name from forest ORDER BY Name");
          while ($row = mysql_fetch_array($result)) {
            echo '<a class="totree" href="#">' . $row['Name'] . '</a><br/>';
          }
          mysql_close($db);
        ?>
      </div>
    </div>
    <div id="gallery">
      <?php
        $db = mysql_connect("localhost", "root","philowarlock68");
        mysql_select_db("forest", $db);
        $result = mysql_query("SELECT * from forest ORDER BY Updated LIMIT 2");
        while ($row = mysql_fetch_array($result)) {
          echo '<a class="totree" href="#"><img style="margin-left:5px" src=' . $row['Image'] . ' alt="Tree picture" /></a>';
        }
        mysql_close($db);
      ?>
      <h3><a class="loadmorepaginator" href="paginator.php">More...</a></h3>
    </div>
  </div>
  <div id="home_content">
      <h2>Home</h2>
  </div>
  <div id="tourguide_content">
    <h2>Tour Guide</h2>
    <div class="accordion">
      <h3><a href="#">1. Getting Started</a></h3>
      <div>
        <ol>
          <li>Enter valid E-mail</li>
          <li>Fill out information </li>
          <li>Check email for confirmation email</li>
          <li>Login with password</li>
        </ol>
      </div>
        <h3><a href="#">2. Go on an Adventure</a></h3>
      <div>
        <ol>
          <li>Click "The Forest"</li>
          <li>Click on a tree or one of the tree names in the list</li>
          <li>Read the node</li>
          <li>Click on an adjacent node to continue the story</li>
        </ol>
      </div>
    </div>
  </div>
  <div id="tree_content">
    <form id="createnode" method="post">
      <h2>Create Node</h2>
        Author: <input type="text" name="Author" /> <br/>
        Blurb: <input type="text" name="Blurb" /> <br/>
        Story: <textarea type="text" name="Content" > </textarea> <br/>
                <input type="submit" value="Finished!" />
    </form>
    <div id="bookmarks">
      <a><h2>Bookmarks</h2></a>
    </div>
    <div id="tree">
      <?php
        $db = mysql_connect("localhost", "root","philowarlock68");
        mysql_select_db("forest", $db);
        $result = mysql_query("SELECT * FROM forest WHERE ID=" . $currID);
        $row = mysql_fetch_array($result);
        echo '<a class="totree" href="#">' . $row['Name'] . '</a>';
        
        //select table $currID, use mySQL and DFS to generate input for tree
        //call jquery function that is now  $(".totree").click
        
        mysql_close($db);
      ?>
    </div>
  </div>
  <div id="plantseed_content">
    <h2>Plant a Seed</h2>
    <div id="seedform">
    <form name="frmPlantSeed" method="post"
    <table name="tblPlantSeed" id="tblPlantSeed" BORDER="0" cellpadding="0" cellspacing="0" WIDTH="1000">
      <tr>
        <td width="100"></td>

        <td width="300"><label><h2>Story name: </h2></label></td>
        <td><input type="text" name="Name" size="20"/> <br/></td></tr>
      <tr>
        <td width="100"></td>
        <td width="300"><label><h2>Author:</h2></label></td>
        <td><input type="text" name="Author" size="20"/> <br/></td></tr>
      <tr>
        <td width="100"></td>
        <td width="300"><label><h2>Story:</h2></label></td>
        <td> <textarea type="text" name="Content" cols="80" rows="25"></textarea> <br/></td></tr>
      <tr>
        <td width="100"></td>
        <td><input class="totree" type="submit" value="Finished!" /></td></tr></table>
    </form>
    </div>
  </div>
  <div id="contactus_content">
    <h2>Contact Us</h2>
    <h3>If you have any questions, comments, or suggestions for us, just fill out the form below and we will get back to you!</h3>
    <br/>
    <form name="frmContactUs" method="post">
    <table name="tblContactUs" id="tblContactUs" BORDER="0" cellpadding="0" cellspacing="0" WIDTH="1000">
      <tr>
        <td width="100"></td>
        <td width="300"><label> Your name: </label></td>
        <td><input type="text" name="Name" /><br/></td></tr>
      <tr>
        <td width="100"></td>
        <td width="300"><label> Your E-mail: </label></td>
        <td><input type="text" name="Email" /><br/></td></tr>
      <tr>
        <td width="100"></td>
        <td width="300"><label> Message: </label></td>
        <td><textarea type="text" name="Message" cols="80" rows="25"></textarea><br/></td></tr>
      <tr>
        <td width="100"></td>
        <td><input type="submit" value="Send!" /></td></tr>
    </table>
    </form>
  </div>
  <div id="TOU_content">
    <h2>Terms of Service:</h2>
        <p>This Terms of Service is created under the Creative Commons Sharealike license.</p>
        <p>The following terms and conditions govern all use of the FicForest__.com website and all content, services and products available at or through the website. The Website is owned and operated by FicForest__. The Website is offered subject to your acceptance without modification of all of the terms and conditions contained herein and all other operating rules, policies and procedures that may be published from time to time on this Site.</p>
        <p>Please read this Agreement carefully before accessing or using the Website. By accessing or using any part of the web site, you agree to become bound by the terms and conditions of this agreement. If you do not agree to all the terms and conditions of this agreement, then you may not access the Website or use any services. If these terms and conditions are considered an offer, acceptance is expressly limited to these terms.</p>
        <ol>
        <li><strong>Your Account and Site.</strong> If you create a entry on the Website, you are responsible for maintaining the security of your account and story, and you are fully responsible for all activities that occur under the account and any other actions taken in connection with the account. You must not construct story in a misleading or unlawful manner, including in a manner intended to trade on the name or reputation of others, and FicForest__ may change or remove any description it considers inappropriate or unlawful, or otherwise likely to cause FicForest liability. You must immediately notify FicForest of any unauthorized uses of your story, your account or any other breaches of security. FicForest will not be liable for any acts or omissions by You, including any damages of any kind incurred as a result of such acts or omissions.</li>
        <li><strong>Responsibility of Contributors.</strong> If you operate a story, comment on a story, post material to the Website, post links on the Website, or otherwise make (or allow any third party to make) material available by means of the Website (any such material, “Content”), You are entirely responsible for the content of, and any harm resulting from, that Content. By making Content available, you represent and warrant that:
        <ul>
        <li>the downloading, copying and use of the Content will not infringe the proprietary rights, including but not limited to the copyright, patent, trademark or trade secret rights, of any third party;</li>
        <li>if your employer has rights to intellectual property you create, you have either (i) received permission from your employer to post or make available the Content, including but not limited to any software, or (ii) secured from your employer a waiver as to all rights in or to the Content;</li>
        <li>you have fully complied with any third-party licenses relating to the Content, and have done all things necessary to successfully pass through to end users any required terms;</li>
        <li class="important">the Content is not spam, is not machine- or randomly-generated, and does not contain unethical or unwanted commercial content designed to drive traffic to third party sites or boost the search engine rankings of third party sites, or to further unlawful acts (such as phishing) or mislead recipients as to the source of the material (such as spoofing);</li>
        <li>the Content does not contain threats or incite violence towards individuals or entities, and does not violate the privacy or publicity rights of any third party;</li>
        <li>your story is not getting advertised via unwanted electronic messages such as spam links on newsgroups, email lists, other storys and web sites, and similar unsolicited promotional methods;</li>
        <li>your story is not named in a manner that misleads your readers into thinking that you are another person or company. </li>
        <li>you have, in the case of Content that includes computer code, accurately categorized and/or described the type, nature, uses and effects of the materials, whether requested to do so by FicForest or otherwise.</li>
        </ul>
        <p>By submitting Content to FicForest, you grant FicForest a world-wide, royalty-free, and non-exclusive license to reproduce, modify, adapt and publish the Content solely for the purpose of displaying, distributing and promoting your story. If you delete Content, FicForest will use reasonable efforts to remove it from the Website, but you acknowledge that caching or references to the Content may not be made immediately unavailable.</p>
        <p>Without limiting any of those representations or warranties, FicForest has the right (though not the obligation) to, in FicForest’s sole discretion (i) refuse or remove any content that, in FicForest’s reasonable opinion, violates any FicForest policy or is in any way harmful or objectionable, or (ii) terminate or deny access to and use of the Website to any individual or entity for any reason, in FicForest’s sole discretion. FicForest will have no obligation to provide a refund of any amounts previously paid.</li>
        <!--
        <li><strong>Payment and Renewal.</strong>
        <ul>
        <li><strong>General Terms. </strong><br />
        Optional paid services such as extra storage, domain purchases, or VIP hosting are available on the Website (any such services, an &#8220;Upgrade&#8221;). By selecting an Upgrade you agree to pay FicForest the monthly or annual subscription fees indicated for that service (additional payment terms specifically for VIP services are described below). Payments will be charged on a pre-pay basis on the day you sign up for an Upgrade and will cover the use of that service for a monthly or annual subscription period as indicated. Upgrade fees are not refundable.</li>
        <li><strong>Automatic Renewal. </strong><br />
        Unless you notify FicForest before the end of the applicable subscription period that you want to cancel an Upgrade, your Upgrade subscription will automatically renew and you authorize us to collect the then-applicable annual or monthly subscription fee for such Upgrade (as well as any taxes) using any credit card or other payment mechanism we have on record for you. Upgrades can be canceled at any time in the Upgrades section of your site&#8217;s dashboard.</li>
        </ul>
        </li>
        <li><strong>VIP Services.</strong></li>
        <ul>
        <li><strong>Fees; Payment. </strong>By signing up for a VIP Services account you agree to pay FicForest the setup fees and monthly hosting fees indicated at <a href="http://vip.ec2-50-19-29-217.compute-1.amazonaws.com.com/">http://vip.ec2-50-19-29-217.compute-1.amazonaws.com.com/</a> in exchange for the services listed at <a href="http://ec2-50-19-29-217.compute-1.amazonaws.com.com/">http://vip.ec2-50-19-29-217.compute-1.amazonaws.com.com/</a>. Applicable fees will be invoiced starting from the day your VIP Services are established and in advance of using such services. FicForest reserves the right to change the payment terms and fees upon thirty (30) days prior written notice to you. VIP Services can be canceled by you at anytime on 30 days written notice to FicForest.</li>
        <li><strong>Support.</strong> VIP Services include access to priority email support. “Email support” means the ability to make requests for technical support assistance by email at any time (with reasonable efforts by FicForest to respond within one business day) concerning the use of the VIP Services. “Priority” means that support for VIP Services customers takes priority over support for users of the standard, free ec2-50-19-29-217.compute-1.amazonaws.com.com storyging services. All VIP Services support will be provided in accordance with FicForest standard VIP Services practices, procedures and policies.</li>
        </ul>
        <li><strong>Firehose.</strong>
        <ul>
        <li><strong>Fees; Payment.</strong> By signing up for the ec2-50-19-29-217.compute-1.amazonaws.com.com Firehose you agree to pay FicForest the specified monthly fees in exchange for access to the feeds. Applicable fees will be invoiced starting from the day your access is established and in advance of using such services. FicForest reserves the right to change the payment terms and fees upon thirty (30) days prior written notice to you. Firehose access can be canceled by you at anytime on 30 days written notice to FicForest.<strong></strong></li>
        <li><strong>Permitted Use.</strong> You may use the ec2-50-19-29-217.compute-1.amazonaws.com.com Firehose to develop a product or service that searches, displays, analyzes, retrieves, and views information available on ec2-50-19-29-217.compute-1.amazonaws.com.com. You may also use the ec2-50-19-29-217.compute-1.amazonaws.com.com name or logos and other brand elements that FicForest makes available in order to identify the source of the information.<strong></strong></li>
        <li><strong>Restricted Use.</strong> You may not use the ec2-50-19-29-217.compute-1.amazonaws.com.com Firehose to substantially replicate products or services offered by FicForest, including the republication of ec2-50-19-29-217.compute-1.amazonaws.com.com content or the creation of a separate publishing platform. If FicForest believes, in its sole discretion, that you have violated or attempted to violate these conditions or the spirit of these terms, your ability to use and access the ec2-50-19-29-217.compute-1.amazonaws.com.com Firehose may be temporarily or permanently revoked, with or without notice.</li>
        </ul>
        </li>
        -->
        <li><strong>Responsibility of Website Visitors.</strong> FicForest has not reviewed, and cannot review, all of the material, posted to the Website, and cannot therefore be responsible for that material’s content, use or effects. By operating the Website, FicForest does not represent or imply that it endorses the material there posted, or that it believes such material to be accurate, useful or non-harmful. You are responsible for taking precautions as necessary to protect yourself from harmful or destructive content. The Website may contain content that is offensive, indecent, or otherwise objectionable, as well as content containing technical inaccuracies, typographical mistakes, and other errors. The Website may also contain material that violates the privacy or publicity rights, or infringes the intellectual property and other proprietary rights, of third parties, or the downloading, copying or use of which is subject to additional terms and conditions, stated or unstated. FicForest disclaims any responsibility for any harm resulting from the use by visitors of the Website, or from any downloading by those visitors of content there posted.</li>
        <li><strong>Content Posted on Other Websites.</strong> We have not reviewed, and cannot review, all of the material made available through the websites and webpages to which ec2-50-19-29-217.compute-1.amazonaws.com.com links, and that link to ec2-50-19-29-217.compute-1.amazonaws.com.com. FicForest does not have any control over those non-ec2-50-19-29-217.compute-1.amazonaws.com websites and webpages, and is not responsible for their contents or their use. By linking to a non-ec2-50-19-29-217.compute-1.amazonaws.com website or webpage, FicForest does not represent or imply that it endorses such website or webpage. You are responsible for taking precautions as necessary to protect yourself from harmful or destructive content. FicForest disclaims any responsibility for any harm resulting from your use of non-ec2-50-19-29-217.compute-1.amazonaws.com websites and webpages.</li>
        <li><strong>Copyright Infringement and DMCA Policy.</strong> As FicForest asks others to respect its intellectual property rights, it respects the intellectual property rights of others. If you believe that material located on or linked to by ec2-50-19-29-217.compute-1.amazonaws.com.com violates your copyright, you are encouraged to notify FicForest in accordance with <a href="http://FicForest.com/dmca/">FicForest’s Digital Millennium Copyright Act (&#8220;DMCA&#8221;) Policy</a>. FicForest will respond to all such notices, including as required or appropriate by removing the infringing material or disabling all links to the infringing material. FicForest will terminate a visitor&#8217;s access to and use of the Website if, under appropriate circumstances, the visitor is determined to be a repeat infringer of the copyrights or other intellectual property rights of FicForest or others.</li>
        <li><strong>Intellectual Property.</strong> This Agreement does not transfer from FicForest to you any FicForest or third party intellectual property, and all right, title and interest in and to such property will remain (as between the parties) solely with FicForest. FicForest, ec2-50-19-29-217.compute-1.amazonaws.com, ec2-50-19-29-217.compute-1.amazonaws.com.com, the ec2-50-19-29-217.compute-1.amazonaws.com.com logo, and all other trademarks, service marks, graphics and logos used in connection with ec2-50-19-29-217.compute-1.amazonaws.com.com, or the Website are trademarks or registered trademarks of FicForest or FicForest’s licensors. Other trademarks, service marks, graphics and logos used in connection with the Website may be the trademarks of other third parties. Your use of the Website grants you no right or license to reproduce or otherwise use any FicForest or third-party trademarks.</li>
        <li><strong>Changes. </strong>FicForest reserves the right, at its sole discretion, to modify or replace any part of this Agreement. It is your responsibility to check this Agreement periodically for changes. Your continued use of or access to the Website following the posting of any changes to this Agreement constitutes acceptance of those changes. FicForest may also, in the future, offer new services and/or features through the Website (including, the release of new tools and resources). Such new features and/or services shall be subject to the terms and conditions of this Agreement. <strong><br />
        </strong></li>
        <li><strong>Termination. </strong>FicForest may terminate your account access to all or any part of the Website at any time, with or without cause, with or without notice, effective immediately. If you wish to terminate this Agreement or your ec2-50-19-29-217.compute-1.amazonaws.com.com account (if you have one), you may simply discontinue using the Website. Notwithstanding the foregoing, if you have a VIP Services account, such account can only be terminated by FicForest if you materially breach this Agreement and fail to cure such breach within thirty (30) days from FicForest’s notice to you thereof; provided that, FicForest can terminate the Website immediately as part of a general shut down of our service. All provisions of this Agreement which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability. <strong><br />
        </strong></li>
        <li class="important"><strong>Disclaimer of Warranties.</strong> The Website is provided &#8220;as is&#8221;. FicForest and its suppliers and licensors hereby disclaim all warranties of any kind, express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. Neither FicForest nor its suppliers and licensors, makes any warranty that the Website will be error free or that access thereto will be continuous or uninterrupted. If you&#8217;re actually reading this, <a href="http://wordpress.com/tos/treat/">here&#8217;s a treat</a>. You understand that you download from, or otherwise obtain content or services through, the Website at your own discretion and risk.</li>
        <li class="important"><strong>Limitation of Liability.</strong> In no event will FicForest, or its suppliers or licensors, be liable with respect to any subject matter of this agreement under any contract, negligence, strict liability or other legal or equitable theory for: (i) any special, incidental or consequential damages; (ii) the cost of procurement for substitute products or services; (iii) for interruption of use or loss or corruption of data; or (iv) for any amounts that exceed the fees paid by you to FicForest under this agreement during the twelve (12) month period prior to the cause of action. FicForest shall have no liability for any failure or delay due to matters beyond their reasonable control. The foregoing shall not apply to the extent prohibited by applicable law.</li>
        <li><strong>General Representation and Warranty.</strong> You represent and warrant that (i) your use of the Website will be in strict accordance with the FicForest Privacy Policy, with this Agreement and with all applicable laws and regulations (including without limitation any local laws or regulations in your country, state, city, or other governmental area, regarding online conduct and acceptable content, and including all applicable laws regarding the transmission of technical data exported from the United States or the country in which you reside) and (ii) your use of the Website will not infringe or misappropriate the intellectual property rights of any third party.</li>
        <li><strong>Indemnification.</strong> You agree to indemnify and hold harmless FicForest, its contractors, and its licensors, and their respective directors, officers, employees and agents from and against any and all claims and expenses, including attorneys’ fees, arising out of your use of the Website, including but not limited to your violation of this Agreement.</li>
        <li><strong>Miscellaneous.</strong> This Agreement constitutes the entire agreement between FicForest and you concerning the subject matter hereof, and they may only be modified by a written amendment signed by an authorized executive of FicForest, or by the posting by FicForest of a revised version. Except to the extent applicable law, if any, provides otherwise, this Agreement, any access to or use of the Website will be governed by the laws of the state of California, U.S.A., excluding its conflict of law provisions, and the proper venue for any disputes arising out of or relating to any of the same will be the state and federal courts located in San Francisco County, California. Except for claims for injunctive or equitable relief or claims regarding intellectual property rights (which may be brought in any competent court without the posting of a bond), any dispute arising under this Agreement shall be finally settled in accordance with the Comprehensive Arbitration Rules of the Judicial Arbitration and Mediation Service, Inc. (“JAMS”) by three arbitrators appointed in accordance with such Rules. The arbitration shall take place in San Francisco, California, in the English language and the arbitral decision may be enforced in any court. The prevailing party in any action or proceeding to enforce this Agreement shall be entitled to costs and attorneys’ fees. If any part of this Agreement is held invalid or unenforceable, that part will be construed to reflect the parties’ original intent, and the remaining portions will remain in full force and effect. A waiver by either party of any term or condition of this Agreement or any breach thereof, in any one instance, will not waive such term or condition or any subsequent breach thereof. You may assign your rights under this Agreement to any party that consents to, and agrees to be bound by, its terms and conditions; FicForest may assign its rights under this Agreement without condition. This Agreement will be binding upon and will inure to the benefit of the parties, their successors and permitted assigns.</li>
        </ol>
        <p><strong>Change log:</strong></p>
        <p>April 14, 2012: Added.<br />
        
  </div>
</div>
<?php
include ("footer.php");
?>

</body>
</html>
