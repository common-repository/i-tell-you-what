<?php
/**
 * @package I Tell You What
 * @version 1.2
 */
/*
Plugin Name: I Tell You What
Plugin URI: https://thewilson.dev
Description: A simple clone of the popular Hello Dolly plugin.  When activated you will see a random quote from Hank Hill in the upper right of your admin screen on every page.
Author: Kyle Wilson
Version: 1.2
Author URI: https://thewilson.dev
*/

function tell_you_what_get_quote() {
	$quotes = [
		"Why would anyone do drugs when they could just mow a lawn?",
		"That boy ain't right.",
		"Bobby, if you weren't my son, I'd hug you.",
		"I'll tell you what my truck needs: leadership. Detroit hasn't felt any pride since George Bush went to Japan and vomited on their auto executives.",
		"Yep.",
		"I wasn't flirting with her! I didn't even mention I work in propane.",
		"You called in a fake propane emergency? That's a $50 fine after I report it.",
		"The only reason why your nails should be black is because you hit them with a hammer.",
		"I need a tap-and-die and some WD-40.",
		"I don't have an anger problem, I have an idiot problem!",
		"You're not making Christianity better, you're just making rock and roll worse!",
		"Maybe I should tie the long hair on your head to the short hair on your ass and kick you down the street!",
		"Bobby, I didn't think I'd ever need to tell you this, but I would be a bad parent if I didn't. Soccer was invented by European ladies to keep them busy while their husbands did the cooking.",
		"Damnit Peggy, I'm trying to control an epidemic here and you're driving the monkey to the airport!",
		"You got an F in English? Bobby, you SPEAK English!",
		"You can't just pick and choose which laws to follow. Sure I'd like to tape a baseball game without the express written consent of Major League Baseball, but that's just not the way it works.",
		"6 A.M. and already the boy ain't right.",
		"Dang it, Bobby!",
		"Mother of God, it's all toilet sounds!",
		"Is this John occupied? Es esta Juan ocupado?",
		"A poodle? Why don't you just get me a cat and a sex change operation?",
		"I tell you what, I caught more fish today than I did in the 80s. And those were the Reagan years!",
		"The only woman I'm pimping is sweet lady propane! And I'm tricking her out all over this town.",
		"I sell propane and propane accessories.",
		"I have a sense of humor. I laugh at Tony Danza.",
		"There's something missing, something wrong... it's like a pretty girl with short hair.",
		"I'm doped out of my gourd!",
		"BWAH!",
		"Where's the ass on this thing?",
		"Ginseng? I don't need to get all hopped-up on dope!",
		"I can't just leave work five minutes early on a Friday, Bobby.",
		"Bobby, there better be a naked cheerleader under your bed.",
		"I work for a living.  And I mean real work, not writing down gobbledy-gook!",
		"Honey, bring me my B-C Headache Powder and a glass of water.",
		"It's called the double standard, Bobby; don't knock it. We got the long end of the stick on that one.",
		"(Hank, are you gay?) What!? No, I sell propane!",
		"Bobby, there's nothing funny about these sounds. What that person on your tape has is a medical disorder.",
		"It's already 110 degrees in the summer, and if it gets one degree hotter, I'm gonna kick your ass!",
		"Though we walk through the valley of the shadow of death, you're gonna recommend us to the spirit in the sky, with liberty and justice for all. Wematanye is with you, and with Texas. Amen.",
		"I'd rather die with a burger in my colon than live and eat faux-fu.",
		"I'll tell you what you need to do. You need to take a thirteenth step... down off your high horse!",
		"[on the Muppets] They got frogs kissin' pigs, what the hell did they think was going to happen?",
		"Do I look like I know what a JPEG is?",
		"You're talkin' like a song from The Lion King.  Stop that, it makes no sense.",
		"Just when I think you've said the stupidest thing ever, you keep talking!",
		"Is there anything beer can't do?",
		"Okay!  Everyone who hasn't had premarital sex gets ice cream!",
		"Forty-five dollars!? The family Bible didn't even cost that much, and it was written by Jesus."
	];

	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );

}

function tell_you_what() {
	$the_quote = tell_you_what_get_quote();
	$lang = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="hank_hill"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Hank Hill, TV character:', 'i-tell-you-what' ),
		$lang,
		$the_quote
	);
}

add_action( 'admin_notices', 'tell_you_what' );

function ityw_css() {
	echo "
	<style type='text/css'>
	#hank_hill {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
		font-style: italic;
	}
	.rtl #hank_hill {
		float: left;
	}
	.block-editor-page #hank_hill {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#hank_hill,
		.rtl #hank_hill {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'ityw_css' );