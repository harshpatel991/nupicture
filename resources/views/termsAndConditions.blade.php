@extends('app')

@section('page-title')
    Terms and Conditions of Use | {{Config::get('app.name')}}
@endsection

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background blog-post-main-column">

                <div class="row">
                    <div class="col-md-offset-2 col-md-8">

                        <h1>Web Site Terms and Conditions of Use</h1>

                        <h3>1. Terms</h3>

                        <p>
                            By accessing this web site, you are agreeing to be bound by these
                            web site Terms and Conditions of Use, all applicable laws and regulations,
                            and agree that you are responsible for compliance with any applicable local
                            laws. If you do not agree with any of these terms, you are prohibited from
                            using or accessing this site. The materials contained in this web site are
                            protected by applicable copyright and trade mark law.
                        </p>

                        <h3>2. Use License</h3>

                        <ol type="a">
                            <li>
                                Permission is granted to temporarily download one copy of the materials
                                (information or software) on {{Config::get('app.name')}}'s web site for personal,
                                non-commercial transitory viewing only. This is the grant of a license,
                                not a transfer of title, and under this license you may not:

                                <ol type="i">
                                    <li>modify or copy the materials;</li>
                                    <li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
                                    <li>attempt to decompile or reverse engineer any software contained on {{Config::get('app.name')}}'s web site;</li>
                                    <li>remove any copyright or other proprietary notations from the materials; or</li>
                                    <li>transfer the materials to another person or "mirror" the materials on any other server.</li>
                                </ol>
                            </li>
                            <li>
                                This license shall automatically terminate if you violate any of these restrictions and may be terminated by {{Config::get('app.name')}} at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.
                            </li>
                        </ol>

                        <h3>3. Disclaimer</h3>

                        <ol type="a">
                            <li>
                                The materials on {{Config::get('app.name')}}'s web site are provided "as is". {{Config::get('app.name')}} makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, {{Config::get('app.name')}} does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.
                            </li>
                        </ol>

                        <h3>4. Limitations</h3>

                        <p>
                            In no event shall {{Config::get('app.name')}} or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on {{Config::get('app.name')}}'s Internet site, even if {{Config::get('app.name')}} or a {{Config::get('app.name')}} authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.
                        </p>

                        <h3>5. Revisions and Errata</h3>

                        <p>
                            The materials appearing on {{Config::get('app.name')}}'s web site could include technical, typographical, or photographic errors. {{Config::get('app.name')}} does not warrant that any of the materials on its web site are accurate, complete, or current. {{Config::get('app.name')}} may make changes to the materials contained on its web site at any time without notice. {{Config::get('app.name')}} does not, however, make any commitment to update the materials.
                        </p>

                        <h3>6. Links</h3>

                        <p>
                            {{Config::get('app.name')}} has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by {{Config::get('app.name')}} of the site. Use of any such linked web site is at the user's own risk.
                        </p>

                        <h3>7. Content</h3>
                        <p>
                            Users warrant that any content sent by the user to be published on the website will comply with the following constraints:
                            <ol>
                                <li>will be original work</li>
                                <li>will not be posted anywhere else, in whole or in part, on the Internet or in any other media</li>
                                <li>will not contain any content of any kind whatsoever that is illegal, infringes any copyrights, or is libelous
                                <li>any third parties contents are included with materials submitted to the site for publishing will have been given appropriate rights from those appropriate thrid parties which hold the copyrights on the published content</li>
                                <li>will be free of offensive, derogatory, harmful, unlawful, threatening, vulgar, profane, abusive, harassing, obscene, pornographic, defamatory or tortuous content.</li>
                            </ol>
                        </p>

                        <p>

                            Users that submit content to the website irrevocably and unconditionally grant {{Config::get('app.name')}} all and complete rights to publish the submitted content on the site or anywhere on the internet, free of charge. {{Config::get('app.name')}} is allowed to publish the content in any edited or modified format without objection from the user. {{Config::get('app.name')}} reserves the right to deny publishing any content for any purpose it sees fit.

                        </p>

                        <h3>8. Site Terms of Use Modifications</h3>

                        <p>
                            {{Config::get('app.name')}} may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.
                        </p>

                        <h3>9. Governing Law</h3>

                        <p>
                            Any claim relating to {{Config::get('app.name')}}'s web site shall be governed by the laws of the State of Texas without regard to its conflict of law provisions.
                        </p>

                    </div>
                </div>

			</div>
		</div> {{--End white background--}}

	</div>
@endsection