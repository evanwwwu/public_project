<?PHP
class Ip_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
	
	function is_china_ip($ip)
	{
	$thisiplong = sprintf("%u",ip2long($ip));
	if($thisiplong >= 16777472 && $thisiplong <= 16777727){return true;}
	if($thisiplong >= 16777728 && $thisiplong <= 16778239){return true;}
	if($thisiplong >= 16779264 && $thisiplong <= 16781311){return true;}
	if($thisiplong >= 16785408 && $thisiplong <= 16793599){return true;}
	if($thisiplong >= 16842752 && $thisiplong <= 16843007){return true;}
	if($thisiplong >= 16843264 && $thisiplong <= 16843775){return true;}
	if($thisiplong >= 16843776 && $thisiplong <= 16844799){return true;}
	if($thisiplong >= 16844800 && $thisiplong <= 16846847){return true;}
	if($thisiplong >= 16846848 && $thisiplong <= 16850943){return true;}
	if($thisiplong >= 16850944 && $thisiplong <= 16859135){return true;}
	if($thisiplong >= 16908288 && $thisiplong <= 16908799){return true;}
	if($thisiplong >= 16908800 && $thisiplong <= 16909055){return true;}
	if($thisiplong >= 16909312 && $thisiplong <= 16910335){return true;}
	if($thisiplong >= 16910336 && $thisiplong <= 16912383){return true;}
	if($thisiplong >= 16912384 && $thisiplong <= 16916479){return true;}
	if($thisiplong >= 16916480 && $thisiplong <= 16924671){return true;}
	if($thisiplong >= 16924672 && $thisiplong <= 16941055){return true;}
	if($thisiplong >= 16973824 && $thisiplong <= 17039359){return true;}
	if($thisiplong >= 17039616 && $thisiplong <= 17039871){return true;}
	if($thisiplong >= 17039872 && $thisiplong <= 17040383){return true;}
	if($thisiplong >= 17040384 && $thisiplong <= 17040639){return true;}
	if($thisiplong >= 17040640 && $thisiplong <= 17040895){return true;}
	if($thisiplong >= 17040896 && $thisiplong <= 17041407){return true;}
	if($thisiplong >= 17041408 && $thisiplong <= 17043455){return true;}
	if($thisiplong >= 17043456 && $thisiplong <= 17047551){return true;}
	if($thisiplong >= 17047552 && $thisiplong <= 17055743){return true;}
	if($thisiplong >= 17055744 && $thisiplong <= 17072127){return true;}
	if($thisiplong >= 17301504 && $thisiplong <= 17367039){return true;}
	if($thisiplong >= 17432576 && $thisiplong <= 17434623){return true;}
	if($thisiplong >= 17434624 && $thisiplong <= 17435135){return true;}
	if($thisiplong >= 17435392 && $thisiplong <= 17435647){return true;}
	if($thisiplong >= 17435648 && $thisiplong <= 17436671){return true;}
	if($thisiplong >= 17436672 && $thisiplong <= 17440767){return true;}
	if($thisiplong >= 17440768 && $thisiplong <= 17448959){return true;}
	if($thisiplong >= 17448960 && $thisiplong <= 17465343){return true;}
	if($thisiplong >= 17563648 && $thisiplong <= 17825791){return true;}
	if($thisiplong >= 18350080 && $thisiplong <= 18874367){return true;}
	if($thisiplong >= 19726336 && $thisiplong <= 19791871){return true;}
	if($thisiplong >= 19922944 && $thisiplong <= 20054015){return true;}
	if($thisiplong >= 20054016 && $thisiplong <= 20119551){return true;}
	if($thisiplong >= 20119552 && $thisiplong <= 20185087){return true;}
	if($thisiplong >= 20447232 && $thisiplong <= 20971519){return true;}
	if($thisiplong >= 21233664 && $thisiplong <= 21495807){return true;}
	if($thisiplong >= 22020096 && $thisiplong <= 22544383){return true;}
	if($thisiplong >= 22544384 && $thisiplong <= 22806527){return true;}
	if($thisiplong >= 22806528 && $thisiplong <= 22937599){return true;}
	if($thisiplong >= 22937600 && $thisiplong <= 23068671){return true;}
	if($thisiplong >= 24379392 && $thisiplong <= 24641535){return true;}
	if($thisiplong >= 28573696 && $thisiplong <= 28835839){return true;}
	if($thisiplong >= 28835840 && $thisiplong <= 28966911){return true;}
	if($thisiplong >= 29097984 && $thisiplong <= 29360127){return true;}
	if($thisiplong >= 29360128 && $thisiplong <= 29884415){return true;}
	if($thisiplong >= 30015488 && $thisiplong <= 30146559){return true;}
	if($thisiplong >= 30146560 && $thisiplong <= 30408703){return true;}
	if($thisiplong >= 234881024 && $thisiplong <= 234883071){return true;}
	if($thisiplong >= 234884096 && $thisiplong <= 234885119){return true;}
	if($thisiplong >= 234946560 && $thisiplong <= 234947583){return true;}
	if($thisiplong >= 235929600 && $thisiplong <= 236978175){return true;}
	if($thisiplong >= 241598464 && $thisiplong <= 241599487){return true;}
	if($thisiplong >= 241605632 && $thisiplong <= 241606655){return true;}
	if($thisiplong >= 241631232 && $thisiplong <= 241696767){return true;}
	if($thisiplong >= 241696768 && $thisiplong <= 242221055){return true;}
	if($thisiplong >= 242221056 && $thisiplong <= 243269631){return true;}
	if($thisiplong >= 243400704 && $thisiplong <= 243531775){return true;}
	if($thisiplong >= 243662848 && $thisiplong <= 243793919){return true;}
	if($thisiplong >= 244318208 && $thisiplong <= 245366783){return true;}
	if($thisiplong >= 247479296 && $thisiplong <= 247480319){return true;}
	if($thisiplong >= 247483392 && $thisiplong <= 247484415){return true;}
	if($thisiplong >= 247726080 && $thisiplong <= 247857151){return true;}
	if($thisiplong >= 248250368 && $thisiplong <= 248381439){return true;}
	if($thisiplong >= 248512512 && $thisiplong <= 249561087){return true;}
	if($thisiplong >= 453509120 && $thisiplong <= 454033407){return true;}
	if($thisiplong >= 454033408 && $thisiplong <= 455081983){return true;}
	if($thisiplong >= 455272448 && $thisiplong <= 455274495){return true;}
	if($thisiplong >= 455344128 && $thisiplong <= 455606271){return true;}
	if($thisiplong >= 455606272 && $thisiplong <= 456130559){return true;}
	if($thisiplong >= 456271872 && $thisiplong <= 456273919){return true;}
	if($thisiplong >= 456294400 && $thisiplong <= 456327167){return true;}
	if($thisiplong >= 456542208 && $thisiplong <= 456544255){return true;}
	if($thisiplong >= 456562688 && $thisiplong <= 456564735){return true;}
	if($thisiplong >= 456572928 && $thisiplong <= 456589311){return true;}
	if($thisiplong >= 459460608 && $thisiplong <= 459464703){return true;}
	if($thisiplong >= 459464704 && $thisiplong <= 459472895){return true;}
	if($thisiplong >= 459505664 && $thisiplong <= 459538431){return true;}
	if($thisiplong >= 459547648 && $thisiplong <= 459548671){return true;}
	if($thisiplong >= 459735040 && $thisiplong <= 459800575){return true;}
	if($thisiplong >= 459964416 && $thisiplong <= 459980799){return true;}
	if($thisiplong >= 459983872 && $thisiplong <= 459984895){return true;}
	if($thisiplong >= 460136448 && $thisiplong <= 460144639){return true;}
	if($thisiplong >= 460324864 && $thisiplong <= 460341247){return true;}
	if($thisiplong >= 460345344 && $thisiplong <= 460349439){return true;}
	if($thisiplong >= 460423168 && $thisiplong <= 460439551){return true;}
	if($thisiplong >= 460521472 && $thisiplong <= 460554239){return true;}
	if($thisiplong >= 460598272 && $thisiplong <= 460599295){return true;}
	if($thisiplong >= 460933120 && $thisiplong <= 460935167){return true;}
	if($thisiplong >= 460945408 && $thisiplong <= 460947455){return true;}
	if($thisiplong >= 461373440 && $thisiplong <= 461504511){return true;}
	if($thisiplong >= 461626368 && $thisiplong <= 461627391){return true;}
	if($thisiplong >= 462422016 && $thisiplong <= 462487551){return true;}
	if($thisiplong >= 462684160 && $thisiplong <= 462946303){return true;}
	if($thisiplong >= 462946304 && $thisiplong <= 463470591){return true;}
	if($thisiplong >= 465043456 && $thisiplong <= 465567743){return true;}
	if($thisiplong >= 465567744 && $thisiplong <= 467664895){return true;}
	if($thisiplong >= 467664896 && $thisiplong <= 467927039){return true;}
	if($thisiplong >= 603979776 && $thisiplong <= 603980799){return true;}
	if($thisiplong >= 603981824 && $thisiplong <= 603983871){return true;}
	if($thisiplong >= 603983872 && $thisiplong <= 603987967){return true;}
	if($thisiplong >= 603987968 && $thisiplong <= 603996159){return true;}
	if($thisiplong >= 603996160 && $thisiplong <= 604012543){return true;}
	if($thisiplong >= 604012544 && $thisiplong <= 604045311){return true;}
	if($thisiplong >= 604045312 && $thisiplong <= 604110847){return true;}
	if($thisiplong >= 604241920 && $thisiplong <= 604504063){return true;}
	if($thisiplong >= 605028352 && $thisiplong <= 606076927){return true;}
	if($thisiplong >= 606076928 && $thisiplong <= 606339071){return true;}
	if($thisiplong >= 606339072 && $thisiplong <= 606404607){return true;}
	if($thisiplong >= 606404608 && $thisiplong <= 606412799){return true;}
	if($thisiplong >= 606413824 && $thisiplong <= 606414335){return true;}
	if($thisiplong >= 606414592 && $thisiplong <= 606414847){return true;}
	if($thisiplong >= 606414848 && $thisiplong <= 606416895){return true;}
	if($thisiplong >= 606416896 && $thisiplong <= 606420991){return true;}
	if($thisiplong >= 606601216 && $thisiplong <= 607125503){return true;}
	if($thisiplong >= 607125504 && $thisiplong <= 607256575){return true;}
	if($thisiplong >= 607322112 && $thisiplong <= 607387647){return true;}
	if($thisiplong >= 607649792 && $thisiplong <= 608174079){return true;}
	if($thisiplong >= 610271232 && $thisiplong <= 612368383){return true;}
	if($thisiplong >= 612368384 && $thisiplong <= 616562687){return true;}
	if($thisiplong >= 616562688 && $thisiplong <= 618659839){return true;}
	if($thisiplong >= 620232704 && $thisiplong <= 620494847){return true;}
	if($thisiplong >= 620625920 && $thisiplong <= 620691455){return true;}
	if($thisiplong >= 654311424 && $thisiplong <= 654311679){return true;}
	if($thisiplong >= 654311936 && $thisiplong <= 654312447){return true;}
	if($thisiplong >= 654312448 && $thisiplong <= 654313471){return true;}
	if($thisiplong >= 654313472 && $thisiplong <= 654315519){return true;}
	if($thisiplong >= 654315520 && $thisiplong <= 654319615){return true;}
	if($thisiplong >= 654319616 && $thisiplong <= 654327807){return true;}
	if($thisiplong >= 654327808 && $thisiplong <= 654344191){return true;}
	if($thisiplong >= 654344192 && $thisiplong <= 654376959){return true;}
	if($thisiplong >= 658505728 && $thisiplong <= 660602879){return true;}
	if($thisiplong >= 660602880 && $thisiplong <= 661651455){return true;}
	if($thisiplong >= 662700032 && $thisiplong <= 666894335){return true;}
	if($thisiplong >= 704643072 && $thisiplong <= 704644095){return true;}
	if($thisiplong >= 704645120 && $thisiplong <= 704647167){return true;}
	if($thisiplong >= 704647168 && $thisiplong <= 704649215){return true;}
	if($thisiplong >= 704649216 && $thisiplong <= 704650239){return true;}
	if($thisiplong >= 704651264 && $thisiplong <= 704659455){return true;}
	if($thisiplong >= 704675840 && $thisiplong <= 704708607){return true;}
	if($thisiplong >= 704708608 && $thisiplong <= 704716799){return true;}
	if($thisiplong >= 704716800 && $thisiplong <= 704720895){return true;}
	if($thisiplong >= 704720896 && $thisiplong <= 704722943){return true;}
	if($thisiplong >= 704722944 && $thisiplong <= 704723967){return true;}
	if($thisiplong >= 704741376 && $thisiplong <= 704774143){return true;}
	if($thisiplong >= 704905216 && $thisiplong <= 705167359){return true;}
	if($thisiplong >= 707788800 && $thisiplong <= 707919871){return true;}
	if($thisiplong >= 707919872 && $thisiplong <= 707985407){return true;}
	if($thisiplong >= 707985408 && $thisiplong <= 708050943){return true;}
	if($thisiplong >= 708050944 && $thisiplong <= 708313087){return true;}
	if($thisiplong >= 708313088 && $thisiplong <= 708575231){return true;}
	if($thisiplong >= 708706304 && $thisiplong <= 708739071){return true;}
	if($thisiplong >= 708739072 && $thisiplong <= 708747263){return true;}
	if($thisiplong >= 708747264 && $thisiplong <= 708751359){return true;}
	if($thisiplong >= 708752384 && $thisiplong <= 708753407){return true;}
	if($thisiplong >= 708753408 && $thisiplong <= 708755455){return true;}
	if($thisiplong >= 708771840 && $thisiplong <= 708837375){return true;}
	if($thisiplong >= 709885952 && $thisiplong <= 710017023){return true;}
	if($thisiplong >= 710098944 && $thisiplong <= 710103039){return true;}
	if($thisiplong >= 710103040 && $thisiplong <= 710104063){return true;}
	if($thisiplong >= 710105088 && $thisiplong <= 710107135){return true;}
	if($thisiplong >= 710107136 && $thisiplong <= 710115327){return true;}
	if($thisiplong >= 710115328 && $thisiplong <= 710148095){return true;}
	if($thisiplong >= 710148096 && $thisiplong <= 710410239){return true;}
	if($thisiplong >= 710410240 && $thisiplong <= 710934527){return true;}
	if($thisiplong >= 710950912 && $thisiplong <= 710959103){return true;}
	if($thisiplong >= 710959104 && $thisiplong <= 710961151){return true;}
	if($thisiplong >= 710962176 && $thisiplong <= 710963199){return true;}
	if($thisiplong >= 710963200 && $thisiplong <= 710967295){return true;}
	if($thisiplong >= 710967296 && $thisiplong <= 711000063){return true;}
	if($thisiplong >= 711000064 && $thisiplong <= 711065599){return true;}
	if($thisiplong >= 711131136 && $thisiplong <= 711147519){return true;}
	if($thisiplong >= 711147520 && $thisiplong <= 711155711){return true;}
	if($thisiplong >= 711155712 && $thisiplong <= 711159807){return true;}
	if($thisiplong >= 711159808 && $thisiplong <= 711160831){return true;}
	if($thisiplong >= 711161856 && $thisiplong <= 711163903){return true;}
	if($thisiplong >= 711196672 && $thisiplong <= 711458815){return true;}
	if($thisiplong >= 712507392 && $thisiplong <= 712638463){return true;}
	if($thisiplong >= 712638464 && $thisiplong <= 712703999){return true;}
	if($thisiplong >= 712704000 && $thisiplong <= 712712191){return true;}
	if($thisiplong >= 712713216 && $thisiplong <= 712714239){return true;}
	if($thisiplong >= 712714240 && $thisiplong <= 712716287){return true;}
	if($thisiplong >= 712716288 && $thisiplong <= 712720383){return true;}
	if($thisiplong >= 712720384 && $thisiplong <= 712736767){return true;}
	if($thisiplong >= 712736768 && $thisiplong <= 712769535){return true;}
	if($thisiplong >= 713031680 && $thisiplong <= 714080255){return true;}
	if($thisiplong >= 714866688 && $thisiplong <= 714874879){return true;}
	if($thisiplong >= 714875904 && $thisiplong <= 714876927){return true;}
	if($thisiplong >= 714876928 && $thisiplong <= 714878975){return true;}
	if($thisiplong >= 714878976 && $thisiplong <= 714883071){return true;}
	if($thisiplong >= 714883072 && $thisiplong <= 714899455){return true;}
	if($thisiplong >= 714899456 && $thisiplong <= 714932223){return true;}
	if($thisiplong >= 714932224 && $thisiplong <= 714997759){return true;}
	if($thisiplong >= 714997760 && $thisiplong <= 715128831){return true;}
	if($thisiplong >= 715128832 && $thisiplong <= 716177407){return true;}
	if($thisiplong >= 716177408 && $thisiplong <= 716701695){return true;}
	if($thisiplong >= 716701696 && $thisiplong <= 716832767){return true;}
	if($thisiplong >= 716832768 && $thisiplong <= 716898303){return true;}
	if($thisiplong >= 716898304 && $thisiplong <= 716914687){return true;}
	if($thisiplong >= 716914688 && $thisiplong <= 716922879){return true;}
	if($thisiplong >= 716922880 && $thisiplong <= 716926975){return true;}
	if($thisiplong >= 716926976 && $thisiplong <= 716929023){return true;}
	if($thisiplong >= 716929024 && $thisiplong <= 716930047){return true;}
	if($thisiplong >= 716931072 && $thisiplong <= 716963839){return true;}
	if($thisiplong >= 717225984 && $thisiplong <= 717357055){return true;}
	if($thisiplong >= 717357056 && $thisiplong <= 717359103){return true;}
	if($thisiplong >= 717359104 && $thisiplong <= 717360127){return true;}
	if($thisiplong >= 717360128 && $thisiplong <= 717361151){return true;}
	if($thisiplong >= 717361152 && $thisiplong <= 717365247){return true;}
	if($thisiplong >= 717365248 && $thisiplong <= 717373439){return true;}
	if($thisiplong >= 717373440 && $thisiplong <= 717389823){return true;}
	if($thisiplong >= 717389824 && $thisiplong <= 717422591){return true;}
	if($thisiplong >= 717422592 && $thisiplong <= 717488127){return true;}
	if($thisiplong >= 717488128 && $thisiplong <= 717750271){return true;}
	if($thisiplong >= 717815808 && $thisiplong <= 717848575){return true;}
	if($thisiplong >= 717881344 && $thisiplong <= 718012415){return true;}
	if($thisiplong >= 718012416 && $thisiplong <= 718274559){return true;}
	if($thisiplong >= 718274560 && $thisiplong <= 719323135){return true;}
	if($thisiplong >= 719323136 && $thisiplong <= 720371711){return true;}
	if($thisiplong >= 720371712 && $thisiplong <= 720404479){return true;}
	if($thisiplong >= 720404480 && $thisiplong <= 720437247){return true;}
	if($thisiplong >= 720502784 && $thisiplong <= 720633855){return true;}
	if($thisiplong >= 720633856 && $thisiplong <= 720895999){return true;}
	if($thisiplong >= 720896000 && $thisiplong <= 721420287){return true;}
	if($thisiplong >= 822345728 && $thisiplong <= 822607871){return true;}
	if($thisiplong >= 825425920 && $thisiplong <= 825491455){return true;}
	if($thisiplong >= 825491456 && $thisiplong <= 825753599){return true;}
	if($thisiplong >= 826277888 && $thisiplong <= 828375039){return true;}
	if($thisiplong >= 829423616 && $thisiplong <= 829947903){return true;}
	if($thisiplong >= 829947904 && $thisiplong <= 830210047){return true;}
	if($thisiplong >= 830472192 && $thisiplong <= 830472447){return true;}
	if($thisiplong >= 830472704 && $thisiplong <= 830473215){return true;}
	if($thisiplong >= 831258624 && $thisiplong <= 831389695){return true;}
	if($thisiplong >= 832045056 && $thisiplong <= 832307199){return true;}
	if($thisiplong >= 835715072 && $thisiplong <= 835846143){return true;}
	if($thisiplong >= 835846144 && $thisiplong <= 835977215){return true;}
	if($thisiplong >= 836501504 && $thisiplong <= 836763647){return true;}
	if($thisiplong >= 837287936 && $thisiplong <= 837550079){return true;}
	if($thisiplong >= 837746688 && $thisiplong <= 837763071){return true;}
	if($thisiplong >= 837795840 && $thisiplong <= 837812223){return true;}
	if($thisiplong >= 838262784 && $thisiplong <= 838270975){return true;}
	if($thisiplong >= 973996032 && $thisiplong <= 974127103){return true;}
	if($thisiplong >= 974127104 && $thisiplong <= 974192639){return true;}
	if($thisiplong >= 974192640 && $thisiplong <= 974225407){return true;}
	if($thisiplong >= 974225408 && $thisiplong <= 974258175){return true;}
	if($thisiplong >= 974258176 && $thisiplong <= 974323711){return true;}
	if($thisiplong >= 974323712 && $thisiplong <= 974389247){return true;}
	if($thisiplong >= 974389248 && $thisiplong <= 974454783){return true;}
	if($thisiplong >= 974454784 && $thisiplong <= 974520319){return true;}
	if($thisiplong >= 974520320 && $thisiplong <= 974651391){return true;}
	if($thisiplong >= 974651392 && $thisiplong <= 974782463){return true;}
	if($thisiplong >= 975044608 && $thisiplong <= 975175679){return true;}
	if($thisiplong >= 975175680 && $thisiplong <= 975699967){return true;}
	if($thisiplong >= 975699968 && $thisiplong <= 975831039){return true;}
	if($thisiplong >= 975831040 && $thisiplong <= 975896575){return true;}
	if($thisiplong >= 975896576 && $thisiplong <= 975962111){return true;}
	if($thisiplong >= 975962112 && $thisiplong <= 976224255){return true;}
	if($thisiplong >= 976224256 && $thisiplong <= 976748543){return true;}
	if($thisiplong >= 976748544 && $thisiplong <= 976879615){return true;}
	if($thisiplong >= 976879616 && $thisiplong <= 976945151){return true;}
	if($thisiplong >= 976945152 && $thisiplong <= 976977919){return true;}
	if($thisiplong >= 976977920 && $thisiplong <= 977010687){return true;}
	if($thisiplong >= 977010688 && $thisiplong <= 977272831){return true;}
	if($thisiplong >= 977397760 && $thisiplong <= 977399807){return true;}
	if($thisiplong >= 977403904 && $thisiplong <= 977534975){return true;}
	if($thisiplong >= 977567744 && $thisiplong <= 977600511){return true;}
	if($thisiplong >= 978452480 && $thisiplong <= 978583551){return true;}
	if($thisiplong >= 978796544 && $thisiplong <= 978812927){return true;}
	if($thisiplong >= 979599360 && $thisiplong <= 979632127){return true;}
	if($thisiplong >= 979632128 && $thisiplong <= 979763199){return true;}
	if($thisiplong >= 980680704 && $thisiplong <= 980942847){return true;}
	if($thisiplong >= 981467136 && $thisiplong <= 981991423){return true;}
	if($thisiplong >= 982515712 && $thisiplong <= 982581247){return true;}
	if($thisiplong >= 983171072 && $thisiplong <= 983302143){return true;}
	if($thisiplong >= 985661440 && $thisiplong <= 985792511){return true;}
	if($thisiplong >= 985792512 && $thisiplong <= 985923583){return true;}
	if($thisiplong >= 985923584 && $thisiplong <= 986054655){return true;}
	if($thisiplong >= 986054656 && $thisiplong <= 986185727){return true;}
	if($thisiplong >= 986185728 && $thisiplong <= 986710015){return true;}
	if($thisiplong >= 986710016 && $thisiplong <= 987758591){return true;}
	if($thisiplong >= 988807168 && $thisiplong <= 988938239){return true;}
	if($thisiplong >= 988938240 && $thisiplong <= 989069311){return true;}
	if($thisiplong >= 989069312 && $thisiplong <= 989200383){return true;}
	if($thisiplong >= 989200384 && $thisiplong <= 989331455){return true;}
	if($thisiplong >= 989331456 && $thisiplong <= 989855743){return true;}
	if($thisiplong >= 991952896 && $thisiplong <= 992477183){return true;}
	if($thisiplong >= 992477184 && $thisiplong <= 992608255){return true;}
	if($thisiplong >= 992608256 && $thisiplong <= 992673791){return true;}
	if($thisiplong >= 992673792 && $thisiplong <= 992739327){return true;}
	if($thisiplong >= 992739328 && $thisiplong <= 993001471){return true;}
	if($thisiplong >= 993001472 && $thisiplong <= 993067007){return true;}
	if($thisiplong >= 993067008 && $thisiplong <= 993099775){return true;}
	if($thisiplong >= 993099776 && $thisiplong <= 993132543){return true;}
	if($thisiplong >= 993132544 && $thisiplong <= 993198079){return true;}
	if($thisiplong >= 993198080 && $thisiplong <= 993230847){return true;}
	if($thisiplong >= 993230848 && $thisiplong <= 993263615){return true;}
	if($thisiplong >= 993263616 && $thisiplong <= 993525759){return true;}
	if($thisiplong >= 993525760 && $thisiplong <= 993787903){return true;}
	if($thisiplong >= 993787904 && $thisiplong <= 993918975){return true;}
	if($thisiplong >= 993918976 && $thisiplong <= 994050047){return true;}
	if($thisiplong >= 994050048 && $thisiplong <= 994312191){return true;}
	if($thisiplong >= 994312192 && $thisiplong <= 994574335){return true;}
	if($thisiplong >= 994574336 && $thisiplong <= 994705407){return true;}
	if($thisiplong >= 994705408 && $thisiplong <= 994836479){return true;}
	if($thisiplong >= 994836480 && $thisiplong <= 994902015){return true;}
	if($thisiplong >= 994902016 && $thisiplong <= 994967551){return true;}
	if($thisiplong >= 994967552 && $thisiplong <= 995098623){return true;}
	if($thisiplong >= 995098624 && $thisiplong <= 995360767){return true;}
	if($thisiplong >= 996868096 && $thisiplong <= 996900863){return true;}
	if($thisiplong >= 996900864 && $thisiplong <= 996933631){return true;}
	if($thisiplong >= 996933632 && $thisiplong <= 997064703){return true;}
	if($thisiplong >= 997064704 && $thisiplong <= 997195775){return true;}
	if($thisiplong >= 999751680 && $thisiplong <= 999784447){return true;}
	if($thisiplong >= 1000013824 && $thisiplong <= 1000079359){return true;}
	if($thisiplong >= 1001127936 && $thisiplong <= 1001259007){return true;}
	if($thisiplong >= 1001259008 && $thisiplong <= 1001390079){return true;}
	if($thisiplong >= 1002373120 && $thisiplong <= 1002405887){return true;}
	if($thisiplong >= 1002434560 && $thisiplong <= 1002438655){return true;}
	if($thisiplong >= 1002438656 && $thisiplong <= 1006632959){return true;}
	if($thisiplong >= 1006632960 && $thisiplong <= 1007157247){return true;}
	if($thisiplong >= 1007157248 && $thisiplong <= 1007288319){return true;}
	if($thisiplong >= 1007288320 && $thisiplong <= 1007353855){return true;}
	if($thisiplong >= 1007353856 && $thisiplong <= 1007419391){return true;}
	if($thisiplong >= 1007419392 && $thisiplong <= 1007484927){return true;}
	if($thisiplong >= 1007484928 && $thisiplong <= 1007501311){return true;}
	if($thisiplong >= 1007501312 && $thisiplong <= 1007517695){return true;}
	if($thisiplong >= 1007517696 && $thisiplong <= 1007550463){return true;}
	if($thisiplong >= 1007550464 && $thisiplong <= 1007681535){return true;}
	if($thisiplong >= 1007681536 && $thisiplong <= 1008205823){return true;}
	if($thisiplong >= 1008205824 && $thisiplong <= 1008467967){return true;}
	if($thisiplong >= 1008467968 && $thisiplong <= 1008599039){return true;}
	if($thisiplong >= 1008599040 && $thisiplong <= 1008664575){return true;}
	if($thisiplong >= 1008664576 && $thisiplong <= 1008730111){return true;}
	if($thisiplong >= 1010237440 && $thisiplong <= 1010302975){return true;}
	if($thisiplong >= 1010761728 && $thisiplong <= 1010827263){return true;}
	if($thisiplong >= 1017118720 && $thisiplong <= 1017249791){return true;}
	if($thisiplong >= 1017249792 && $thisiplong <= 1017380863){return true;}
	if($thisiplong >= 1017380864 && $thisiplong <= 1017511935){return true;}
	if($thisiplong >= 1017511936 && $thisiplong <= 1017643007){return true;}
	if($thisiplong >= 1017643008 && $thisiplong <= 1018167295){return true;}
	if($thisiplong >= 1018167296 && $thisiplong <= 1019215871){return true;}
	if($thisiplong >= 1019346944 && $thisiplong <= 1019478015){return true;}
	if($thisiplong >= 1019740160 && $thisiplong <= 1020002303){return true;}
	if($thisiplong >= 1020002304 && $thisiplong <= 1020067839){return true;}
	if($thisiplong >= 1020067840 && $thisiplong <= 1020133375){return true;}
	if($thisiplong >= 1020133376 && $thisiplong <= 1020264447){return true;}
	if($thisiplong >= 1020264448 && $thisiplong <= 1020788735){return true;}
	if($thisiplong >= 1020788736 && $thisiplong <= 1020919807){return true;}
	if($thisiplong >= 1020919808 && $thisiplong <= 1021050879){return true;}
	if($thisiplong >= 1021050880 && $thisiplong <= 1021313023){return true;}
	if($thisiplong >= 1021837312 && $thisiplong <= 1021968383){return true;}
	if($thisiplong >= 1022033920 && $thisiplong <= 1022099455){return true;}
	if($thisiplong >= 1022722048 && $thisiplong <= 1022754815){return true;}
	if($thisiplong >= 1022820352 && $thisiplong <= 1022885887){return true;}
	if($thisiplong >= 1023148032 && $thisiplong <= 1023213567){return true;}
	if($thisiplong >= 1023246336 && $thisiplong <= 1023279103){return true;}
	if($thisiplong >= 1023344640 && $thisiplong <= 1023410175){return true;}
	if($thisiplong >= 1023692800 && $thisiplong <= 1023693823){return true;}
	if($thisiplong >= 1023693824 && $thisiplong <= 1023694847){return true;}
	if($thisiplong >= 1023694848 && $thisiplong <= 1023696895){return true;}
	if($thisiplong >= 1023717376 && $thisiplong <= 1023721471){return true;}
	if($thisiplong >= 1023975424 && $thisiplong <= 1023979519){return true;}
	if($thisiplong >= 1025245184 && $thisiplong <= 1025249279){return true;}
	if($thisiplong >= 1025249280 && $thisiplong <= 1025253375){return true;}
	if($thisiplong >= 1025253376 && $thisiplong <= 1025261567){return true;}
	if($thisiplong >= 1025261568 && $thisiplong <= 1025277951){return true;}
	if($thisiplong >= 1025343488 && $thisiplong <= 1025359871){return true;}
	if($thisiplong >= 1025359872 && $thisiplong <= 1025368063){return true;}
	if($thisiplong >= 1025368064 && $thisiplong <= 1025372159){return true;}
	if($thisiplong >= 1025372160 && $thisiplong <= 1025376255){return true;}
	if($thisiplong >= 1026392064 && $thisiplong <= 1026408447){return true;}
	if($thisiplong >= 1026416640 && $thisiplong <= 1026420735){return true;}
	if($thisiplong >= 1026523136 && $thisiplong <= 1026539519){return true;}
	if($thisiplong >= 1026555904 && $thisiplong <= 1026818047){return true;}
	if($thisiplong >= 1026818048 && $thisiplong <= 1026949119){return true;}
	if($thisiplong >= 1026949120 && $thisiplong <= 1027014655){return true;}
	if($thisiplong >= 1027014656 && $thisiplong <= 1027080191){return true;}
	if($thisiplong >= 1029160960 && $thisiplong <= 1029177343){return true;}
	if($thisiplong >= 1031798784 && $thisiplong <= 1031929855){return true;}
	if($thisiplong >= 1031929856 && $thisiplong <= 1032060927){return true;}
	if($thisiplong >= 1032060928 && $thisiplong <= 1032126463){return true;}
	if($thisiplong >= 1032126464 && $thisiplong <= 1032159231){return true;}
	if($thisiplong >= 1032159232 && $thisiplong <= 1032191999){return true;}
	if($thisiplong >= 1032192000 && $thisiplong <= 1032208383){return true;}
	if($thisiplong >= 1032208384 && $thisiplong <= 1032216575){return true;}
	if($thisiplong >= 1032216576 && $thisiplong <= 1032224767){return true;}
	if($thisiplong >= 1032224768 && $thisiplong <= 1032241151){return true;}
	if($thisiplong >= 1032241152 && $thisiplong <= 1032257535){return true;}
	if($thisiplong >= 1032257536 && $thisiplong <= 1032323071){return true;}
	if($thisiplong >= 1032323072 && $thisiplong <= 1032339455){return true;}
	if($thisiplong >= 1032339456 && $thisiplong <= 1032355839){return true;}
	if($thisiplong >= 1032355840 && $thisiplong <= 1032388607){return true;}
	if($thisiplong >= 1032388608 && $thisiplong <= 1032421375){return true;}
	if($thisiplong >= 1032421376 && $thisiplong <= 1032454143){return true;}
	if($thisiplong >= 1032454144 && $thisiplong <= 1032470527){return true;}
	if($thisiplong >= 1032470528 && $thisiplong <= 1032486911){return true;}
	if($thisiplong >= 1032486912 && $thisiplong <= 1032503295){return true;}
	if($thisiplong >= 1032503296 && $thisiplong <= 1032519679){return true;}
	if($thisiplong >= 1032519680 && $thisiplong <= 1032552447){return true;}
	if($thisiplong >= 1032552448 && $thisiplong <= 1032568831){return true;}
	if($thisiplong >= 1032568832 && $thisiplong <= 1032585215){return true;}
	if($thisiplong >= 1032585216 && $thisiplong <= 1032847359){return true;}
	if($thisiplong >= 1032847360 && $thisiplong <= 1033109503){return true;}
	if($thisiplong >= 1033109504 && $thisiplong <= 1033240575){return true;}
	if($thisiplong >= 1033240576 && $thisiplong <= 1033371647){return true;}
	if($thisiplong >= 1033371648 && $thisiplong <= 1033437183){return true;}
	if($thisiplong >= 1033437184 && $thisiplong <= 1033502719){return true;}
	if($thisiplong >= 1033502720 && $thisiplong <= 1033633791){return true;}
	if($thisiplong >= 1033633792 && $thisiplong <= 1033699327){return true;}
	if($thisiplong >= 1033699328 && $thisiplong <= 1033764863){return true;}
	if($thisiplong >= 1033764864 && $thisiplong <= 1033797631){return true;}
	if($thisiplong >= 1033797632 && $thisiplong <= 1033830399){return true;}
	if($thisiplong >= 1033830400 && $thisiplong <= 1033846783){return true;}
	if($thisiplong >= 1033846784 && $thisiplong <= 1033863167){return true;}
	if($thisiplong >= 1033863168 && $thisiplong <= 1033895935){return true;}
	if($thisiplong >= 1033895936 && $thisiplong <= 1033961471){return true;}
	if($thisiplong >= 1033961472 && $thisiplong <= 1033977855){return true;}
	if($thisiplong >= 1033977856 && $thisiplong <= 1033994239){return true;}
	if($thisiplong >= 1033994240 && $thisiplong <= 1034027007){return true;}
	if($thisiplong >= 1034027008 && $thisiplong <= 1034092543){return true;}
	if($thisiplong >= 1034092544 && $thisiplong <= 1034158079){return true;}
	if($thisiplong >= 1034158080 && $thisiplong <= 1034223615){return true;}
	if($thisiplong >= 1034223616 && $thisiplong <= 1034289151){return true;}
	if($thisiplong >= 1034289152 && $thisiplong <= 1034354687){return true;}
	if($thisiplong >= 1034354688 && $thisiplong <= 1034420223){return true;}
	if($thisiplong >= 1034420224 && $thisiplong <= 1034485759){return true;}
	if($thisiplong >= 1034485760 && $thisiplong <= 1034551295){return true;}
	if($thisiplong >= 1034551296 && $thisiplong <= 1034682367){return true;}
	if($thisiplong >= 1034682368 && $thisiplong <= 1034944511){return true;}
	if($thisiplong >= 1034944512 && $thisiplong <= 1035010047){return true;}
	if($thisiplong >= 1035010048 && $thisiplong <= 1035075583){return true;}
	if($thisiplong >= 1035075584 && $thisiplong <= 1035141119){return true;}
	if($thisiplong >= 1035141120 && $thisiplong <= 1035206655){return true;}
	if($thisiplong >= 1035206656 && $thisiplong <= 1035239423){return true;}
	if($thisiplong >= 1035239424 && $thisiplong <= 1035272191){return true;}
	if($thisiplong >= 1035272192 && $thisiplong <= 1035337727){return true;}
	if($thisiplong >= 1035337728 && $thisiplong <= 1035403263){return true;}
	if($thisiplong >= 1035403264 && $thisiplong <= 1035468799){return true;}
	if($thisiplong >= 1035468800 && $thisiplong <= 1035730943){return true;}
	if($thisiplong >= 1035730944 && $thisiplong <= 1035796479){return true;}
	if($thisiplong >= 1035796480 && $thisiplong <= 1035829247){return true;}
	if($thisiplong >= 1035829248 && $thisiplong <= 1035862015){return true;}
	if($thisiplong >= 1035862016 && $thisiplong <= 1035993087){return true;}
	if($thisiplong >= 1038614528 && $thisiplong <= 1038876671){return true;}
	if($thisiplong >= 1038876672 && $thisiplong <= 1039007743){return true;}
	if($thisiplong >= 1039138816 && $thisiplong <= 1039400959){return true;}
	if($thisiplong >= 1694498816 && $thisiplong <= 1694499839){return true;}
	if($thisiplong >= 1694564352 && $thisiplong <= 1694565375){return true;}
	if($thisiplong >= 1694673920 && $thisiplong <= 1694674943){return true;}
	if($thisiplong >= 1694760960 && $thisiplong <= 1695023103){return true;}
	if($thisiplong >= 1695547392 && $thisiplong <= 1696595967){return true;}
	if($thisiplong >= 1696595968 && $thisiplong <= 1697644543){return true;}
	if($thisiplong >= 1697644544 && $thisiplong <= 1697775615){return true;}
	if($thisiplong >= 1697789952 && $thisiplong <= 1697790975){return true;}
	if($thisiplong >= 1697906688 && $thisiplong <= 1697972223){return true;}
	if($thisiplong >= 1697997824 && $thisiplong <= 1697998847){return true;}
	if($thisiplong >= 1698037760 && $thisiplong <= 1698103295){return true;}
	if($thisiplong >= 1698160640 && $thisiplong <= 1698162687){return true;}
	if($thisiplong >= 1698693120 && $thisiplong <= 1699217407){return true;}
	if($thisiplong >= 1699217408 && $thisiplong <= 1699479551){return true;}
	if($thisiplong >= 1699479552 && $thisiplong <= 1699610623){return true;}
	if($thisiplong >= 1699610624 && $thisiplong <= 1699611647){return true;}
	if($thisiplong >= 1699618816 && $thisiplong <= 1699627007){return true;}
	if($thisiplong >= 1699741696 && $thisiplong <= 1700790271){return true;}
	if($thisiplong >= 1700790272 && $thisiplong <= 1700792319){return true;}
	if($thisiplong >= 1700792320 && $thisiplong <= 1700793343){return true;}
	if($thisiplong >= 1700794368 && $thisiplong <= 1700798463){return true;}
	if($thisiplong >= 1700823040 && $thisiplong <= 1700855807){return true;}
	if($thisiplong >= 1701011456 && $thisiplong <= 1701019647){return true;}
	if($thisiplong >= 1701134336 && $thisiplong <= 1701142527){return true;}
	if($thisiplong >= 1701143552 && $thisiplong <= 1701143807){return true;}
	if($thisiplong >= 1701144064 && $thisiplong <= 1701144575){return true;}
	if($thisiplong >= 1701144576 && $thisiplong <= 1701146623){return true;}
	if($thisiplong >= 1701146624 && $thisiplong <= 1701150719){return true;}
	if($thisiplong >= 1701199872 && $thisiplong <= 1701208063){return true;}
	if($thisiplong >= 1701209088 && $thisiplong <= 1701209599){return true;}
	if($thisiplong >= 1701209600 && $thisiplong <= 1701209855){return true;}
	if($thisiplong >= 1701210112 && $thisiplong <= 1701212159){return true;}
	if($thisiplong >= 1701212160 && $thisiplong <= 1701216255){return true;}
	if($thisiplong >= 1701314560 && $thisiplong <= 1701576703){return true;}
	if($thisiplong >= 1701724160 && $thisiplong <= 1701732351){return true;}
	if($thisiplong >= 1701732352 && $thisiplong <= 1701736447){return true;}
	if($thisiplong >= 1701737472 && $thisiplong <= 1701738495){return true;}
	if($thisiplong >= 1701738496 && $thisiplong <= 1701740543){return true;}
	if($thisiplong >= 1702363136 && $thisiplong <= 1702625279){return true;}
	if($thisiplong >= 1702625280 && $thisiplong <= 1702756351){return true;}
	if($thisiplong >= 1702756352 && $thisiplong <= 1702821887){return true;}
	if($thisiplong >= 1702887424 && $thisiplong <= 1702888447){return true;}
	if($thisiplong >= 1702889472 && $thisiplong <= 1702891519){return true;}
	if($thisiplong >= 1702891520 && $thisiplong <= 1702895615){return true;}
	if($thisiplong >= 1702895616 && $thisiplong <= 1702903807){return true;}
	if($thisiplong >= 1702952960 && $thisiplong <= 1703018495){return true;}
	if($thisiplong >= 1703018496 && $thisiplong <= 1703149567){return true;}
	if($thisiplong >= 1703149568 && $thisiplong <= 1703411711){return true;}
	if($thisiplong >= 1703936000 && $thisiplong <= 1704984575){return true;}
	if($thisiplong >= 1707081728 && $thisiplong <= 1707343871){return true;}
	if($thisiplong >= 1707343872 && $thisiplong <= 1707606015){return true;}
	if($thisiplong >= 1707606016 && $thisiplong <= 1707737087){return true;}
	if($thisiplong >= 1707835392 && $thisiplong <= 1707843583){return true;}
	if($thisiplong >= 1707843584 && $thisiplong <= 1707845631){return true;}
	if($thisiplong >= 1707846656 && $thisiplong <= 1707847679){return true;}
	if($thisiplong >= 1707847680 && $thisiplong <= 1707851775){return true;}
	if($thisiplong >= 1707868160 && $thisiplong <= 1708130303){return true;}
	if($thisiplong >= 1709178880 && $thisiplong <= 1709703167){return true;}
	if($thisiplong >= 1709703168 && $thisiplong <= 1709834239){return true;}
	if($thisiplong >= 1709850624 && $thisiplong <= 1709852671){return true;}
	if($thisiplong >= 1709853696 && $thisiplong <= 1709854719){return true;}
	if($thisiplong >= 1709854720 && $thisiplong <= 1709858815){return true;}
	if($thisiplong >= 1709858816 && $thisiplong <= 1709867007){return true;}
	if($thisiplong >= 1709965312 && $thisiplong <= 1710227455){return true;}
	if($thisiplong >= 1710227456 && $thisiplong <= 1710489599){return true;}
	if($thisiplong >= 1710489600 && $thisiplong <= 1710751743){return true;}
	if($thisiplong >= 1710751744 && $thisiplong <= 1710882815){return true;}
	if($thisiplong >= 1710948352 && $thisiplong <= 1710949375){return true;}
	if($thisiplong >= 1710950400 && $thisiplong <= 1710952447){return true;}
	if($thisiplong >= 1710952448 && $thisiplong <= 1710956543){return true;}
	if($thisiplong >= 1710956544 && $thisiplong <= 1710964735){return true;}
	if($thisiplong >= 1710964736 && $thisiplong <= 1710981119){return true;}
	if($thisiplong >= 1710981120 && $thisiplong <= 1711013887){return true;}
	if($thisiplong >= 1711013888 && $thisiplong <= 1711144959){return true;}
	if($thisiplong >= 1711144960 && $thisiplong <= 1711210495){return true;}
	if($thisiplong >= 1728120832 && $thisiplong <= 1728121855){return true;}
	if($thisiplong >= 1728123904 && $thisiplong <= 1728124927){return true;}
	if($thisiplong >= 1728124928 && $thisiplong <= 1728125951){return true;}
	if($thisiplong >= 1728137216 && $thisiplong <= 1728138239){return true;}
	if($thisiplong >= 1728141312 && $thisiplong <= 1728142335){return true;}
	if($thisiplong >= 1728161792 && $thisiplong <= 1728162815){return true;}
	if($thisiplong >= 1728211968 && $thisiplong <= 1728212991){return true;}
	if($thisiplong >= 1728224256 && $thisiplong <= 1728225279){return true;}
	if($thisiplong >= 1728226304 && $thisiplong <= 1728227327){return true;}
	if($thisiplong >= 1728235520 && $thisiplong <= 1728236543){return true;}
	if($thisiplong >= 1728236544 && $thisiplong <= 1728237567){return true;}
	if($thisiplong >= 1728237568 && $thisiplong <= 1728238591){return true;}
	if($thisiplong >= 1728238592 && $thisiplong <= 1728239615){return true;}
	if($thisiplong >= 1728271360 && $thisiplong <= 1728272383){return true;}
	if($thisiplong >= 1728272384 && $thisiplong <= 1728273407){return true;}
	if($thisiplong >= 1728273408 && $thisiplong <= 1728274431){return true;}
	if($thisiplong >= 1728274432 && $thisiplong <= 1728275455){return true;}
	if($thisiplong >= 1728275456 && $thisiplong <= 1728276479){return true;}
	if($thisiplong >= 1728276480 && $thisiplong <= 1728277503){return true;}
	if($thisiplong >= 1728277504 && $thisiplong <= 1728278527){return true;}
	if($thisiplong >= 1728278528 && $thisiplong <= 1728279551){return true;}
	if($thisiplong >= 1728279552 && $thisiplong <= 1728280575){return true;}
	if($thisiplong >= 1728280576 && $thisiplong <= 1728281599){return true;}
	if($thisiplong >= 1728281600 && $thisiplong <= 1728282623){return true;}
	if($thisiplong >= 1728282624 && $thisiplong <= 1728283647){return true;}
	if($thisiplong >= 1728283648 && $thisiplong <= 1728284671){return true;}
	if($thisiplong >= 1728284672 && $thisiplong <= 1728285695){return true;}
	if($thisiplong >= 1728285696 && $thisiplong <= 1728286719){return true;}
	if($thisiplong >= 1728287744 && $thisiplong <= 1728288767){return true;}
	if($thisiplong >= 1728288768 && $thisiplong <= 1728289791){return true;}
	if($thisiplong >= 1728289792 && $thisiplong <= 1728290815){return true;}
	if($thisiplong >= 1728329728 && $thisiplong <= 1728330751){return true;}
	if($thisiplong >= 1728708608 && $thisiplong <= 1728709631){return true;}
	if($thisiplong >= 1728712704 && $thisiplong <= 1728713727){return true;}
	if($thisiplong >= 1728730112 && $thisiplong <= 1728731135){return true;}
	if($thisiplong >= 1728737024 && $thisiplong <= 1728737279){return true;}
	if($thisiplong >= 1729543168 && $thisiplong <= 1729544191){return true;}
	if($thisiplong >= 1729553408 && $thisiplong <= 1729554431){return true;}
	if($thisiplong >= 1729559552 && $thisiplong <= 1729560575){return true;}
	if($thisiplong >= 1729957888 && $thisiplong <= 1729958911){return true;}
	if($thisiplong >= 1744205824 && $thisiplong <= 1744206847){return true;}
	if($thisiplong >= 1744206848 && $thisiplong <= 1744207871){return true;}
	if($thisiplong >= 1778384896 && $thisiplong <= 1778385151){return true;}
	if($thisiplong >= 1778385408 && $thisiplong <= 1778385919){return true;}
	if($thisiplong >= 1778385920 && $thisiplong <= 1778386943){return true;}
	if($thisiplong >= 1778386944 && $thisiplong <= 1778388991){return true;}
	if($thisiplong >= 1778388992 && $thisiplong <= 1778393087){return true;}
	if($thisiplong >= 1778401280 && $thisiplong <= 1778417663){return true;}
	if($thisiplong >= 1778515968 && $thisiplong <= 1778647039){return true;}
	if($thisiplong >= 1778647040 && $thisiplong <= 1778909183){return true;}
	if($thisiplong >= 1778909184 && $thisiplong <= 1779040255){return true;}
	if($thisiplong >= 1779105792 && $thisiplong <= 1779171327){return true;}
	if($thisiplong >= 1779171328 && $thisiplong <= 1779433471){return true;}
	if($thisiplong >= 1779433472 && $thisiplong <= 1780482047){return true;}
	if($thisiplong >= 1780482048 && $thisiplong <= 1781530623){return true;}
	if($thisiplong >= 1781530624 && $thisiplong <= 1781661695){return true;}
	if($thisiplong >= 1781661696 && $thisiplong <= 1781727231){return true;}
	if($thisiplong >= 1781792768 && $thisiplong <= 1782054911){return true;}
	if($thisiplong >= 1782054912 && $thisiplong <= 1782579199){return true;}
	if($thisiplong >= 1783234560 && $thisiplong <= 1783365631){return true;}
	if($thisiplong >= 1783627776 && $thisiplong <= 1784676351){return true;}
	if($thisiplong >= 1785462784 && $thisiplong <= 1785724927){return true;}
	if($thisiplong >= 1785724928 && $thisiplong <= 1786249215){return true;}
	if($thisiplong >= 1786249216 && $thisiplong <= 1786773503){return true;}
	if($thisiplong >= 1793064960 && $thisiplong <= 1794113535){return true;}
	if($thisiplong >= 1845886976 && $thisiplong <= 1846018047){return true;}
	if($thisiplong >= 1846542336 && $thisiplong <= 1846804479){return true;}
	if($thisiplong >= 1848115200 && $thisiplong <= 1848377343){return true;}
	if($thisiplong >= 1848414208 && $thisiplong <= 1848418303){return true;}
	if($thisiplong >= 1848639488 && $thisiplong <= 1848705023){return true;}
	if($thisiplong >= 1848836096 && $thisiplong <= 1848901631){return true;}
	if($thisiplong >= 1848901632 && $thisiplong <= 1849032703){return true;}
	if($thisiplong >= 1849163776 && $thisiplong <= 1849688063){return true;}
	if($thisiplong >= 1849688064 && $thisiplong <= 1849819135){return true;}
	if($thisiplong >= 1850212352 && $thisiplong <= 1850343423){return true;}
	if($thisiplong >= 1850408960 && $thisiplong <= 1850441727){return true;}
	if($thisiplong >= 1850441728 && $thisiplong <= 1850449919){return true;}
	if($thisiplong >= 1850449920 && $thisiplong <= 1850458111){return true;}
	if($thisiplong >= 1850458112 && $thisiplong <= 1850474495){return true;}
	if($thisiplong >= 1850474496 && $thisiplong <= 1850482687){return true;}
	if($thisiplong >= 1850482688 && $thisiplong <= 1850490879){return true;}
	if($thisiplong >= 1850514432 && $thisiplong <= 1850515455){return true;}
	if($thisiplong >= 1850521600 && $thisiplong <= 1850522623){return true;}
	if($thisiplong >= 1850523648 && $thisiplong <= 1850540031){return true;}
	if($thisiplong >= 1850540032 && $thisiplong <= 1850572799){return true;}
	if($thisiplong >= 1850736640 && $thisiplong <= 1851260927){return true;}
	if($thisiplong >= 1851260928 && $thisiplong <= 1851523071){return true;}
	if($thisiplong >= 1851596800 && $thisiplong <= 1851604991){return true;}
	if($thisiplong >= 1851654144 && $thisiplong <= 1851785215){return true;}
	if($thisiplong >= 1851785216 && $thisiplong <= 1853882367){return true;}
	if($thisiplong >= 1855455232 && $thisiplong <= 1855717375){return true;}
	if($thisiplong >= 1855717376 && $thisiplong <= 1855848447){return true;}
	if($thisiplong >= 1856315392 && $thisiplong <= 1856323583){return true;}
	if($thisiplong >= 1856372736 && $thisiplong <= 1856503807){return true;}
	if($thisiplong >= 1856815104 && $thisiplong <= 1856831487){return true;}
	if($thisiplong >= 1856831488 && $thisiplong <= 1856839679){return true;}
	if($thisiplong >= 1856839680 && $thisiplong <= 1856843775){return true;}
	if($thisiplong >= 1856847872 && $thisiplong <= 1856856063){return true;}
	if($thisiplong >= 1856856064 && $thisiplong <= 1856864255){return true;}
	if($thisiplong >= 1856880640 && $thisiplong <= 1856888831){return true;}
	if($thisiplong >= 1857028096 && $thisiplong <= 1857552383){return true;}
	if($thisiplong >= 1857552384 && $thisiplong <= 1858076671){return true;}
	if($thisiplong >= 1858076672 && $thisiplong <= 1860173823){return true;}
	if($thisiplong >= 1860435968 && $thisiplong <= 1860698111){return true;}
	if($thisiplong >= 1860706304 && $thisiplong <= 1860714495){return true;}
	if($thisiplong >= 1860960256 && $thisiplong <= 1861091327){return true;}
	if($thisiplong >= 1861222400 && $thisiplong <= 1862270975){return true;}
	if($thisiplong >= 1862270976 && $thisiplong <= 1866465279){return true;}
	if($thisiplong >= 1866596352 && $thisiplong <= 1866661887){return true;}
	if($thisiplong >= 1866711040 && $thisiplong <= 1866715135){return true;}
	if($thisiplong >= 1866743808 && $thisiplong <= 1866751999){return true;}
	if($thisiplong >= 1866989568 && $thisiplong <= 1867513855){return true;}
	if($thisiplong >= 1867841536 && $thisiplong <= 1867907071){return true;}
	if($thisiplong >= 1868283904 && $thisiplong <= 1868292095){return true;}
	if($thisiplong >= 1869611008 && $thisiplong <= 1869742079){return true;}
	if($thisiplong >= 1869742080 && $thisiplong <= 1869873151){return true;}
	if($thisiplong >= 1869873152 && $thisiplong <= 1870004223){return true;}
	if($thisiplong >= 1870055424 && $thisiplong <= 1870057471){return true;}
	if($thisiplong >= 1870086144 && $thisiplong <= 1870102527){return true;}
	if($thisiplong >= 1870102528 && $thisiplong <= 1870110719){return true;}
	if($thisiplong >= 1870135296 && $thisiplong <= 1870397439){return true;}
	if($thisiplong >= 1870397440 && $thisiplong <= 1870462975){return true;}
	if($thisiplong >= 1870528512 && $thisiplong <= 1870659583){return true;}
	if($thisiplong >= 1870659584 && $thisiplong <= 1872756735){return true;}
	if($thisiplong >= 1872756736 && $thisiplong <= 1873281023){return true;}
	if($thisiplong >= 1873412096 && $thisiplong <= 1873477631){return true;}
	if($thisiplong >= 1873543168 && $thisiplong <= 1873805311){return true;}
	if($thisiplong >= 1873805312 && $thisiplong <= 1874329599){return true;}
	if($thisiplong >= 1874460672 && $thisiplong <= 1874591743){return true;}
	if($thisiplong >= 1874853888 && $thisiplong <= 1875902463){return true;}
	if($thisiplong >= 1875902464 && $thisiplong <= 1876164607){return true;}
	if($thisiplong >= 1876164608 && $thisiplong <= 1876426751){return true;}
	if($thisiplong >= 1876787200 && $thisiplong <= 1876819967){return true;}
	if($thisiplong >= 1876819968 && $thisiplong <= 1876885503){return true;}
	if($thisiplong >= 1876946944 && $thisiplong <= 1876947967){return true;}
	if($thisiplong >= 1876948992 && $thisiplong <= 1876950015){return true;}
	if($thisiplong >= 1876951040 && $thisiplong <= 1877213183){return true;}
	if($thisiplong >= 1877213184 && $thisiplong <= 1877475327){return true;}
	if($thisiplong >= 1877696512 && $thisiplong <= 1877704703){return true;}
	if($thisiplong >= 1877711872 && $thisiplong <= 1877712895){return true;}
	if($thisiplong >= 1877712896 && $thisiplong <= 1877721087){return true;}
	if($thisiplong >= 1879048192 && $thisiplong <= 1883242495){return true;}
	if($thisiplong >= 1883242496 && $thisiplong <= 1883373567){return true;}
	if($thisiplong >= 1883373568 && $thisiplong <= 1883504639){return true;}
	if($thisiplong >= 1883832320 && $thisiplong <= 1883897855){return true;}
	if($thisiplong >= 1883897856 && $thisiplong <= 1884028927){return true;}
	if($thisiplong >= 1884291072 && $thisiplong <= 1884815359){return true;}
	if($thisiplong >= 1884815360 && $thisiplong <= 1885339647){return true;}
	if($thisiplong >= 1885339648 && $thisiplong <= 1885470719){return true;}
	if($thisiplong >= 1885470720 && $thisiplong <= 1885601791){return true;}
	if($thisiplong >= 1885601792 && $thisiplong <= 1885863935){return true;}
	if($thisiplong >= 1886224384 && $thisiplong <= 1886257151){return true;}
	if($thisiplong >= 1886322688 && $thisiplong <= 1886388223){return true;}
	if($thisiplong >= 1886388224 && $thisiplong <= 1886650367){return true;}
	if($thisiplong >= 1886650368 && $thisiplong <= 1886781439){return true;}
	if($thisiplong >= 1887043584 && $thisiplong <= 1887174655){return true;}
	if($thisiplong >= 1887174656 && $thisiplong <= 1887436799){return true;}
	if($thisiplong >= 1887436800 && $thisiplong <= 1887698943){return true;}
	if($thisiplong >= 1887698944 && $thisiplong <= 1887764479){return true;}
	if($thisiplong >= 1888038912 && $thisiplong <= 1888040959){return true;}
	if($thisiplong >= 1891631104 && $thisiplong <= 1891893247){return true;}
	if($thisiplong >= 1893728256 && $thisiplong <= 1895825407){return true;}
	if($thisiplong >= 1895825408 && $thisiplong <= 1896349695){return true;}
	if($thisiplong >= 1896349696 && $thisiplong <= 1896480767){return true;}
	if($thisiplong >= 1896595456 && $thisiplong <= 1896603647){return true;}
	if($thisiplong >= 1896611840 && $thisiplong <= 1896873983){return true;}
	if($thisiplong >= 1896873984 && $thisiplong <= 1897005055){return true;}
	if($thisiplong >= 1897005056 && $thisiplong <= 1897070591){return true;}
	if($thisiplong >= 1897398272 && $thisiplong <= 1897660415){return true;}
	if($thisiplong >= 1897857024 && $thisiplong <= 1897922559){return true;}
	if($thisiplong >= 1898708992 && $thisiplong <= 1898971135){return true;}
	if($thisiplong >= 1898971136 && $thisiplong <= 1899233279){return true;}
	if($thisiplong >= 1899274240 && $thisiplong <= 1899282431){return true;}
	if($thisiplong >= 1899364352 && $thisiplong <= 1899495423){return true;}
	if($thisiplong >= 1899495424 && $thisiplong <= 1899626495){return true;}
	if($thisiplong >= 1899626496 && $thisiplong <= 1899692031){return true;}
	if($thisiplong >= 1899692032 && $thisiplong <= 1899724799){return true;}
	if($thisiplong >= 1899749376 && $thisiplong <= 1899750399){return true;}
	if($thisiplong >= 1899888640 && $thisiplong <= 1900019711){return true;}
	if($thisiplong >= 1900019712 && $thisiplong <= 1902116863){return true;}
	if($thisiplong >= 1902116864 && $thisiplong <= 1903165439){return true;}
	if($thisiplong >= 1903165440 && $thisiplong <= 1903689727){return true;}
	if($thisiplong >= 1903689728 && $thisiplong <= 1904214015){return true;}
	if($thisiplong >= 1904214016 && $thisiplong <= 1904345087){return true;}
	if($thisiplong >= 1904369664 && $thisiplong <= 1904373759){return true;}
	if($thisiplong >= 1904373760 && $thisiplong <= 1904375807){return true;}
	if($thisiplong >= 1904476160 && $thisiplong <= 1904738303){return true;}
	if($thisiplong >= 1904738304 && $thisiplong <= 1905262591){return true;}
	if($thisiplong >= 1908539392 && $thisiplong <= 1908670463){return true;}
	if($thisiplong >= 1908761600 && $thisiplong <= 1908762623){return true;}
	if($thisiplong >= 1908932608 && $thisiplong <= 1909063679){return true;}
	if($thisiplong >= 1909063680 && $thisiplong <= 1909129215){return true;}
	if($thisiplong >= 1909194752 && $thisiplong <= 1909456895){return true;}
	if($thisiplong >= 1909481472 && $thisiplong <= 1909489663){return true;}
	if($thisiplong >= 1909489664 && $thisiplong <= 1909522431){return true;}
	if($thisiplong >= 1909522432 && $thisiplong <= 1909587967){return true;}
	if($thisiplong >= 1909719040 && $thisiplong <= 1909735423){return true;}
	if($thisiplong >= 1909744640 && $thisiplong <= 1909745663){return true;}
	if($thisiplong >= 1909766144 && $thisiplong <= 1909768191){return true;}
	if($thisiplong >= 1909784576 && $thisiplong <= 1909817343){return true;}
	if($thisiplong >= 1909850112 && $thisiplong <= 1909981183){return true;}
	if($thisiplong >= 1910112256 && $thisiplong <= 1910243327){return true;}
	if($thisiplong >= 1910243328 && $thisiplong <= 1910505471){return true;}
	if($thisiplong >= 1910505472 && $thisiplong <= 1911554047){return true;}
	if($thisiplong >= 1911554048 && $thisiplong <= 1912078335){return true;}
	if($thisiplong >= 1912078336 && $thisiplong <= 1912340479){return true;}
	if($thisiplong >= 1914437632 && $thisiplong <= 1914503167){return true;}
	if($thisiplong >= 1916141568 && $thisiplong <= 1916272639){return true;}
	if($thisiplong >= 1916534784 && $thisiplong <= 1916796927){return true;}
	if($thisiplong >= 1916796928 && $thisiplong <= 1917059071){return true;}
	if($thisiplong >= 1917059072 && $thisiplong <= 1917124607){return true;}
	if($thisiplong >= 1917796352 && $thisiplong <= 1917812735){return true;}
	if($thisiplong >= 1917845504 && $thisiplong <= 1918894079){return true;}
	if($thisiplong >= 1918894080 && $thisiplong <= 1919418367){return true;}
	if($thisiplong >= 1919418368 && $thisiplong <= 1919680511){return true;}
	if($thisiplong >= 1919811584 && $thisiplong <= 1919815679){return true;}
	if($thisiplong >= 1919827968 && $thisiplong <= 1919844351){return true;}
	if($thisiplong >= 1919877120 && $thisiplong <= 1919885311){return true;}
	if($thisiplong >= 1919918080 && $thisiplong <= 1919926271){return true;}
	if($thisiplong >= 1919942656 && $thisiplong <= 1920204799){return true;}
	if($thisiplong >= 1920204800 && $thisiplong <= 1920335871){return true;}
	if($thisiplong >= 1920335872 && $thisiplong <= 1920466943){return true;}
	if($thisiplong >= 1921253376 && $thisiplong <= 1921318911){return true;}
	if($thisiplong >= 1921449984 && $thisiplong <= 1921515519){return true;}
	if($thisiplong >= 1921646592 && $thisiplong <= 1921777663){return true;}
	if($thisiplong >= 1921859584 && $thisiplong <= 1921861631){return true;}
	if($thisiplong >= 1921875968 && $thisiplong <= 1921892351){return true;}
	if($thisiplong >= 1925447680 && $thisiplong <= 1925578751){return true;}
	if($thisiplong >= 1925642240 && $thisiplong <= 1925644287){return true;}
	if($thisiplong >= 1926234112 && $thisiplong <= 1926496255){return true;}
	if($thisiplong >= 1926496256 && $thisiplong <= 1926627327){return true;}
	if($thisiplong >= 1926627328 && $thisiplong <= 1926692863){return true;}
	if($thisiplong >= 1926692864 && $thisiplong <= 1926758399){return true;}
	if($thisiplong >= 1926758400 && $thisiplong <= 1927282687){return true;}
	if($thisiplong >= 1927282688 && $thisiplong <= 1928331263){return true;}
	if($thisiplong >= 1928331264 && $thisiplong <= 1929379839){return true;}
	if($thisiplong >= 1930952704 && $thisiplong <= 1931214847){return true;}
	if($thisiplong >= 1931214848 && $thisiplong <= 1931345919){return true;}
	if($thisiplong >= 1931476992 && $thisiplong <= 1931739135){return true;}
	if($thisiplong >= 1932263424 && $thisiplong <= 1932394495){return true;}
	if($thisiplong >= 1932394496 && $thisiplong <= 1932460031){return true;}
	if($thisiplong >= 1932460032 && $thisiplong <= 1932525567){return true;}
	if($thisiplong >= 1932525568 && $thisiplong <= 1933574143){return true;}
	if($thisiplong >= 1933918208 && $thisiplong <= 1933922303){return true;}
	if($thisiplong >= 1934884864 && $thisiplong <= 1934901247){return true;}
	if($thisiplong >= 1934934016 && $thisiplong <= 1934942207){return true;}
	if($thisiplong >= 1934999552 && $thisiplong <= 1935015935){return true;}
	if($thisiplong >= 1935933440 && $thisiplong <= 1936195583){return true;}
	if($thisiplong >= 1936195584 && $thisiplong <= 1936457727){return true;}
	if($thisiplong >= 1937244160 && $thisiplong <= 1937506303){return true;}
	if($thisiplong >= 1937510400 && $thisiplong <= 1937514495){return true;}
	if($thisiplong >= 1939079168 && $thisiplong <= 1939341311){return true;}
	if($thisiplong >= 1939341312 && $thisiplong <= 1939472383){return true;}
	if($thisiplong >= 1939472384 && $thisiplong <= 1939603455){return true;}
	if($thisiplong >= 1939603456 && $thisiplong <= 1939734527){return true;}
	if($thisiplong >= 1939734528 && $thisiplong <= 1939800063){return true;}
	if($thisiplong >= 1939800064 && $thisiplong <= 1939865599){return true;}
	
	if($thisiplong >= 1940275200 && $thisiplong <= 1940283391){return true;}
	if($thisiplong >= 1940389888 && $thisiplong <= 1940652031){return true;}
	if($thisiplong >= 1940652032 && $thisiplong <= 1940914175){return true;}
	if($thisiplong >= 1941176320 && $thisiplong <= 1941438463){return true;}
	if($thisiplong >= 1941831680 && $thisiplong <= 1941962751){return true;}
	if($thisiplong >= 1941962752 && $thisiplong <= 1944059903){return true;}
	if($thisiplong >= 1944059904 && $thisiplong <= 1945108479){return true;}
	if($thisiplong >= 1946159104 && $thisiplong <= 1946161151){return true;}
	if($thisiplong >= 1946163200 && $thisiplong <= 1946165247){return true;}
	if($thisiplong >= 1946222592 && $thisiplong <= 1946288127){return true;}
	if($thisiplong >= 1946288128 && $thisiplong <= 1946419199){return true;}
	if($thisiplong >= 1946419200 && $thisiplong <= 1946681343){return true;}
	if($thisiplong >= 1946681344 && $thisiplong <= 1946943487){return true;}
	if($thisiplong >= 1947009024 && $thisiplong <= 1947074559){return true;}
	if($thisiplong >= 1947205632 && $thisiplong <= 1948254207){return true;}
	if($thisiplong >= 1949433856 && $thisiplong <= 1949437951){return true;}
	if($thisiplong >= 1949564928 && $thisiplong <= 1949827071){return true;}
	if($thisiplong >= 1949827072 && $thisiplong <= 1949958143){return true;}
	if($thisiplong >= 1949990912 && $thisiplong <= 1949995007){return true;}
	if($thisiplong >= 1950011392 && $thisiplong <= 1950015487){return true;}
	if($thisiplong >= 1950089216 && $thisiplong <= 1950351359){return true;}
	if($thisiplong >= 1950482432 && $thisiplong <= 1950515199){return true;}
	if($thisiplong >= 1950679040 && $thisiplong <= 1950744575){return true;}
	if($thisiplong >= 1950744576 && $thisiplong <= 1950777343){return true;}
	if($thisiplong >= 1951137792 && $thisiplong <= 1951268863){return true;}
	if($thisiplong >= 1951268864 && $thisiplong <= 1951399935){return true;}
	if($thisiplong >= 1951727616 && $thisiplong <= 1951793151){return true;}
	if($thisiplong >= 1952026624 && $thisiplong <= 1952030719){return true;}
	if($thisiplong >= 1952075776 && $thisiplong <= 1952079871){return true;}
	if($thisiplong >= 1952102400 && $thisiplong <= 1952104447){return true;}
	if($thisiplong >= 1952382976 && $thisiplong <= 1952448511){return true;}
	if($thisiplong >= 1953497088 && $thisiplong <= 1953759231){return true;}
	if($thisiplong >= 1953759232 && $thisiplong <= 1953890303){return true;}
	if($thisiplong >= 1954545664 && $thisiplong <= 1958739967){return true;}
	if($thisiplong >= 1958739968 && $thisiplong <= 1958805503){return true;}
	if($thisiplong >= 1958809600 && $thisiplong <= 1958813695){return true;}
	if($thisiplong >= 1958813696 && $thisiplong <= 1958821887){return true;}
	if($thisiplong >= 1958850560 && $thisiplong <= 1958852607){return true;}
	if($thisiplong >= 1958871040 && $thisiplong <= 1959002111){return true;}
	if($thisiplong >= 1959002112 && $thisiplong <= 1959067647){return true;}
	if($thisiplong >= 1959133184 && $thisiplong <= 1959198719){return true;}
	if($thisiplong >= 1959198720 && $thisiplong <= 1959231487){return true;}
	if($thisiplong >= 1959231488 && $thisiplong <= 1959239679){return true;}
	if($thisiplong >= 1959526400 && $thisiplong <= 1959657471){return true;}
	if($thisiplong >= 1959723008 && $thisiplong <= 1959788543){return true;}
	if($thisiplong >= 1959788544 && $thisiplong <= 1960050687){return true;}
	if($thisiplong >= 1960091648 && $thisiplong <= 1960095743){return true;}
	if($thisiplong >= 1960132608 && $thisiplong <= 1960148991){return true;}
	if($thisiplong >= 1960148992 && $thisiplong <= 1960181759){return true;}
	if($thisiplong >= 1960189952 && $thisiplong <= 1960198143){return true;}
	if($thisiplong >= 1960198144 && $thisiplong <= 1960202239){return true;}
	if($thisiplong >= 1960214528 && $thisiplong <= 1960247295){return true;}
	if($thisiplong >= 1960247296 && $thisiplong <= 1960312831){return true;}
	if($thisiplong >= 1960312832 && $thisiplong <= 1960574975){return true;}
	if($thisiplong >= 1960837120 && $thisiplong <= 1961885695){return true;}
	if($thisiplong >= 1962016768 && $thisiplong <= 1962147839){return true;}
	if($thisiplong >= 1962147840 && $thisiplong <= 1962278911){return true;}
	if($thisiplong >= 1962278912 && $thisiplong <= 1962409983){return true;}
	if($thisiplong >= 1962409984 && $thisiplong <= 1962541055){return true;}
	if($thisiplong >= 1962622976 && $thisiplong <= 1962639359){return true;}
	if($thisiplong >= 1962672128 && $thisiplong <= 1962803199){return true;}
	if($thisiplong >= 1962835968 && $thisiplong <= 1962868735){return true;}
	if($thisiplong >= 1962901504 && $thisiplong <= 1962934271){return true;}
	if($thisiplong >= 1963458560 && $thisiplong <= 1963982847){return true;}
	if($thisiplong >= 1964310528 && $thisiplong <= 1964376063){return true;}
	if($thisiplong >= 1964376064 && $thisiplong <= 1964507135){return true;}
	if($thisiplong >= 1964507136 && $thisiplong <= 1965031423){return true;}
	if($thisiplong >= 1965031424 && $thisiplong <= 1965555711){return true;}
	if($thisiplong >= 1965555712 && $thisiplong <= 1965817855){return true;}
	if($thisiplong >= 1965817856 && $thisiplong <= 1965948927){return true;}
	if($thisiplong >= 1966080000 && $thisiplong <= 1966342143){return true;}
	if($thisiplong >= 1966419968 && $thisiplong <= 1966424063){return true;}
	if($thisiplong >= 1966452736 && $thisiplong <= 1966456831){return true;}
	if($thisiplong >= 1966669824 && $thisiplong <= 1966735359){return true;}
	if($thisiplong >= 1966735360 && $thisiplong <= 1966768127){return true;}
	if($thisiplong >= 1966800896 && $thisiplong <= 1966866431){return true;}
	if($thisiplong >= 1966866432 && $thisiplong <= 1967128575){return true;}
	if($thisiplong >= 1967128576 && $thisiplong <= 1967652863){return true;}
	if($thisiplong >= 1967652864 && $thisiplong <= 1967783935){return true;}
	if($thisiplong >= 1967800320 && $thisiplong <= 1967804415){return true;}
	if($thisiplong >= 1967804416 && $thisiplong <= 1967808511){return true;}
	if($thisiplong >= 1967816704 && $thisiplong <= 1967849471){return true;}
	if($thisiplong >= 1967849472 && $thisiplong <= 1967915007){return true;}
	if($thisiplong >= 1967915008 && $thisiplong <= 1968177151){return true;}
	if($thisiplong >= 1968177152 && $thisiplong <= 1969225727){return true;}
	if($thisiplong >= 1969487872 && $thisiplong <= 1969618943){return true;}
	if($thisiplong >= 1969688576 && $thisiplong <= 1969692671){return true;}
	if($thisiplong >= 1969694720 && $thisiplong <= 1969696767){return true;}
	if($thisiplong >= 1969702912 && $thisiplong <= 1969704959){return true;}
	if($thisiplong >= 1969717248 && $thisiplong <= 1969721343){return true;}
	if($thisiplong >= 1969793024 && $thisiplong <= 1969795071){return true;}
	if($thisiplong >= 1969881088 && $thisiplong <= 1970012159){return true;}
	if($thisiplong >= 1970274304 && $thisiplong <= 1970798591){return true;}
	if($thisiplong >= 1970814976 && $thisiplong <= 1970831359){return true;}
	if($thisiplong >= 1970831360 && $thisiplong <= 1970864127){return true;}
	if($thisiplong >= 1970864128 && $thisiplong <= 1970896895){return true;}
	if($thisiplong >= 1970896896 && $thisiplong <= 1970913279){return true;}
	if($thisiplong >= 1970913280 && $thisiplong <= 1970915327){return true;}
	if($thisiplong >= 1970962432 && $thisiplong <= 1970995199){return true;}
	if($thisiplong >= 1971060736 && $thisiplong <= 1971322879){return true;}
	if($thisiplong >= 1971322880 && $thisiplong <= 1975517183){return true;}
	if($thisiplong >= 1981284352 && $thisiplong <= 1981415423){return true;}
	if($thisiplong >= 1981415424 && $thisiplong <= 1981480959){return true;}
	if($thisiplong >= 1981480960 && $thisiplong <= 1981546495){return true;}
	if($thisiplong >= 1981546496 && $thisiplong <= 1981677567){return true;}
	if($thisiplong >= 1981677568 && $thisiplong <= 1981743103){return true;}
	if($thisiplong >= 1981743104 && $thisiplong <= 1981808639){return true;}
	if($thisiplong >= 1983905792 && $thisiplong <= 1984036863){return true;}
	if($thisiplong >= 1984036864 && $thisiplong <= 1984102399){return true;}
	if($thisiplong >= 1984131072 && $thisiplong <= 1984135167){return true;}
	if($thisiplong >= 1984430080 && $thisiplong <= 1984954367){return true;}
	if($thisiplong >= 1984954368 && $thisiplong <= 1985085439){return true;}
	if($thisiplong >= 1985216512 && $thisiplong <= 1985347583){return true;}
	if($thisiplong >= 1985486848 && $thisiplong <= 1985495039){return true;}
	if($thisiplong >= 1985495040 && $thisiplong <= 1985511423){return true;}
	if($thisiplong >= 1985511424 && $thisiplong <= 1985544191){return true;}
	if($thisiplong >= 1985544192 && $thisiplong <= 1985609727){return true;}
	if($thisiplong >= 1985736704 && $thisiplong <= 1985740799){return true;}
	if($thisiplong >= 1986400256 && $thisiplong <= 1986404351){return true;}
	if($thisiplong >= 1986404352 && $thisiplong <= 1986406399){return true;}
	if($thisiplong >= 1987051520 && $thisiplong <= 1987575807){return true;}
	if($thisiplong >= 1987575808 && $thisiplong <= 1987837951){return true;}
	if($thisiplong >= 1987837952 && $thisiplong <= 1987969023){return true;}
	if($thisiplong >= 1987969024 && $thisiplong <= 1988034559){return true;}
	if($thisiplong >= 1988067328 && $thisiplong <= 1988075519){return true;}
	if($thisiplong >= 1988362240 && $thisiplong <= 1988624383){return true;}
	if($thisiplong >= 1989148672 && $thisiplong <= 1989410815){return true;}
	if($thisiplong >= 1991376896 && $thisiplong <= 1991442431){return true;}
	if($thisiplong >= 1991507968 && $thisiplong <= 1991770111){return true;}
	if($thisiplong >= 1991770112 && $thisiplong <= 1991835647){return true;}
	if($thisiplong >= 1991835648 && $thisiplong <= 1991901183){return true;}
	if($thisiplong >= 1991901184 && $thisiplong <= 1992032255){return true;}
	if($thisiplong >= 1992032256 && $thisiplong <= 1992294399){return true;}
	if($thisiplong >= 1992294400 && $thisiplong <= 1992425471){return true;}
	if($thisiplong >= 1992425472 && $thisiplong <= 1992458239){return true;}
	if($thisiplong >= 1992458240 && $thisiplong <= 1992491007){return true;}
	if($thisiplong >= 1992491008 && $thisiplong <= 1992556543){return true;}
	if($thisiplong >= 1992556544 && $thisiplong <= 1992818687){return true;}
	if($thisiplong >= 1992818688 && $thisiplong <= 1992949759){return true;}
	if($thisiplong >= 1992949760 && $thisiplong <= 1993080831){return true;}
	if($thisiplong >= 1993080832 && $thisiplong <= 1993342975){return true;}
	if($thisiplong >= 1993605120 && $thisiplong <= 1993670655){return true;}
	if($thisiplong >= 1993670656 && $thisiplong <= 1993736191){return true;}
	if($thisiplong >= 1994391552 && $thisiplong <= 1994653695){return true;}
	if($thisiplong >= 1994653696 && $thisiplong <= 1994784767){return true;}
	if($thisiplong >= 1994784768 && $thisiplong <= 1994850303){return true;}
	if($thisiplong >= 1995374592 && $thisiplong <= 1995440127){return true;}
	if($thisiplong >= 1995571200 && $thisiplong <= 1995636735){return true;}
	if($thisiplong >= 1995702272 && $thisiplong <= 1995964415){return true;}
	if($thisiplong >= 1995964416 && $thisiplong <= 1996488703){return true;}
	if($thisiplong >= 1996488704 && $thisiplong <= 1996619775){return true;}
	if($thisiplong >= 1996619776 && $thisiplong <= 1996627967){return true;}
	if($thisiplong >= 1996652544 && $thisiplong <= 1996685311){return true;}
	if($thisiplong >= 1996685312 && $thisiplong <= 1996750847){return true;}
	if($thisiplong >= 1996750848 && $thisiplong <= 1997012991){return true;}
	if($thisiplong >= 1997012992 && $thisiplong <= 1997144063){return true;}
	if($thisiplong >= 1997144064 && $thisiplong <= 1997176831){return true;}
	if($thisiplong >= 1997506560 && $thisiplong <= 1997508607){return true;}
	if($thisiplong >= 1997537280 && $thisiplong <= 1997602815){return true;}
	if($thisiplong >= 1997717504 && $thisiplong <= 1997721599){return true;}
	if($thisiplong >= 1997721600 && $thisiplong <= 1997723647){return true;}
	if($thisiplong >= 1997725696 && $thisiplong <= 1997729791){return true;}
	if($thisiplong >= 1997729792 && $thisiplong <= 1997733887){return true;}
	if($thisiplong >= 1997733888 && $thisiplong <= 1997799423){return true;}
	if($thisiplong >= 1997799424 && $thisiplong <= 1998061567){return true;}
	if($thisiplong >= 1998274560 && $thisiplong <= 1998290943){return true;}
	if($thisiplong >= 1998290944 && $thisiplong <= 1998299135){return true;}
	if($thisiplong >= 1998299136 && $thisiplong <= 1998307327){return true;}
	if($thisiplong >= 1998307328 && $thisiplong <= 1998323711){return true;}
	if($thisiplong >= 1998323712 && $thisiplong <= 1998454783){return true;}
	if($thisiplong >= 1998467072 && $thisiplong <= 1998471167){return true;}
	if($thisiplong >= 1998569472 && $thisiplong <= 1998577663){return true;}
	if($thisiplong >= 1998585856 && $thisiplong <= 1998847999){return true;}
	if($thisiplong >= 1998848000 && $thisiplong <= 1998913535){return true;}
	if($thisiplong >= 1998913536 && $thisiplong <= 1998946303){return true;}
	if($thisiplong >= 1998946304 && $thisiplong <= 1998962687){return true;}
	if($thisiplong >= 1998962688 && $thisiplong <= 1998979071){return true;}
	if($thisiplong >= 1998979072 && $thisiplong <= 1999011839){return true;}
	if($thisiplong >= 1999011840 && $thisiplong <= 1999028223){return true;}
	if($thisiplong >= 1999028224 && $thisiplong <= 1999032319){return true;}
	if($thisiplong >= 1999032320 && $thisiplong <= 1999036415){return true;}
	if($thisiplong >= 1999036416 && $thisiplong <= 1999044607){return true;}
	if($thisiplong >= 1999044608 && $thisiplong <= 1999110143){return true;}
	if($thisiplong >= 1999110144 && $thisiplong <= 1999126527){return true;}
	if($thisiplong >= 1999126528 && $thisiplong <= 1999130623){return true;}
	if($thisiplong >= 1999142912 && $thisiplong <= 1999175679){return true;}
	if($thisiplong >= 1999175680 && $thisiplong <= 1999241215){return true;}
	if($thisiplong >= 1999241216 && $thisiplong <= 1999249407){return true;}
	if($thisiplong >= 1999273984 && $thisiplong <= 1999276031){return true;}
	if($thisiplong >= 1999276032 && $thisiplong <= 1999278079){return true;}
	if($thisiplong >= 1999298560 && $thisiplong <= 1999306751){return true;}
	if($thisiplong >= 1999372288 && $thisiplong <= 1999503359){return true;}
	if($thisiplong >= 1999634432 && $thisiplong <= 2000158719){return true;}
	if($thisiplong >= 2000224256 && $thisiplong <= 2000289791){return true;}
	if($thisiplong >= 2000289792 && $thisiplong <= 2000355327){return true;}
	if($thisiplong >= 2000388096 && $thisiplong <= 2000420863){return true;}
	if($thisiplong >= 2000420864 && $thisiplong <= 2000486399){return true;}
	if($thisiplong >= 2000486400 && $thisiplong <= 2000551935){return true;}
	if($thisiplong >= 2000551936 && $thisiplong <= 2000617471){return true;}
	if($thisiplong >= 2000625664 && $thisiplong <= 2000633855){return true;}
	if($thisiplong >= 2001457152 && $thisiplong <= 2001461247){return true;}
	if($thisiplong >= 2001600512 && $thisiplong <= 2001731583){return true;}
	if($thisiplong >= 2001731584 && $thisiplong <= 2001797119){return true;}
	if($thisiplong >= 2001915904 && $thisiplong <= 2001919999){return true;}
	if($thisiplong >= 2001993728 && $thisiplong <= 2002255871){return true;}
	if($thisiplong >= 2002255872 && $thisiplong <= 2002518015){return true;}
	if($thisiplong >= 2002780160 && $thisiplong <= 2003304447){return true;}
	if($thisiplong >= 2003566592 && $thisiplong <= 2003697663){return true;}
	if($thisiplong >= 2003828736 && $thisiplong <= 2004353023){return true;}
	if($thisiplong >= 2004353024 && $thisiplong <= 2004877311){return true;}
	if($thisiplong >= 2004877312 && $thisiplong <= 2005925887){return true;}
	if($thisiplong >= 2005925888 && $thisiplong <= 2006188031){return true;}
	if($thisiplong >= 2006228992 && $thisiplong <= 2006233087){return true;}
	if($thisiplong >= 2006233088 && $thisiplong <= 2006237183){return true;}
	if($thisiplong >= 2006433792 && $thisiplong <= 2006450175){return true;}
	if($thisiplong >= 2007025664 && $thisiplong <= 2007027711){return true;}
	if($thisiplong >= 2007072768 && $thisiplong <= 2007105535){return true;}
	if($thisiplong >= 2007105536 && $thisiplong <= 2007236607){return true;}
	if($thisiplong >= 2007236608 && $thisiplong <= 2007498751){return true;}
	if($thisiplong >= 2008023040 && $thisiplong <= 2009071615){return true;}
	if($thisiplong >= 2011693056 && $thisiplong <= 2011824127){return true;}
	if($thisiplong >= 2011922432 && $thisiplong <= 2011938815){return true;}
	if($thisiplong >= 2012741632 && $thisiplong <= 2013003775){return true;}
	if($thisiplong >= 2013028352 && $thisiplong <= 2013030399){return true;}
	if($thisiplong >= 2013065216 && $thisiplong <= 2013069311){return true;}
	if($thisiplong >= 2013069312 && $thisiplong <= 2013134847){return true;}
	if($thisiplong >= 2013134848 && $thisiplong <= 2013265919){return true;}
	if($thisiplong >= 2013265920 && $thisiplong <= 2014314495){return true;}
	if($thisiplong >= 2014838784 && $thisiplong <= 2015100927){return true;}
	if($thisiplong >= 2015232000 && $thisiplong <= 2015297535){return true;}
	if($thisiplong >= 2015297536 && $thisiplong <= 2015363071){return true;}
	if($thisiplong >= 2015363072 && $thisiplong <= 2015887359){return true;}
	if($thisiplong >= 2015887360 && $thisiplong <= 2016149503){return true;}
	if($thisiplong >= 2016149504 && $thisiplong <= 2016411647){return true;}
	if($thisiplong >= 2016411648 && $thisiplong <= 2016542719){return true;}
	if($thisiplong >= 2016673792 && $thisiplong <= 2016935935){return true;}
	if($thisiplong >= 2017460224 && $thisiplong <= 2017722367){return true;}
	if($thisiplong >= 2017722368 && $thisiplong <= 2017984511){return true;}
	if($thisiplong >= 2017992704 && $thisiplong <= 2018000895){return true;}
	if($thisiplong >= 2018017280 && $thisiplong <= 2018050047){return true;}
	if($thisiplong >= 2018246656 && $thisiplong <= 2018508799){return true;}
	if($thisiplong >= 2018508800 && $thisiplong <= 2019033087){return true;}
	if($thisiplong >= 2019035136 && $thisiplong <= 2019037183){return true;}
	if($thisiplong >= 2019164160 && $thisiplong <= 2019295231){return true;}
	if($thisiplong >= 2019295232 && $thisiplong <= 2019360767){return true;}
	if($thisiplong >= 2019426304 && $thisiplong <= 2019491839){return true;}
	if($thisiplong >= 2019491840 && $thisiplong <= 2019557375){return true;}
	if($thisiplong >= 2021654528 && $thisiplong <= 2021916671){return true;}
	if($thisiplong >= 2021916672 && $thisiplong <= 2021949439){return true;}
	if($thisiplong >= 2021949440 && $thisiplong <= 2021982207){return true;}
	if($thisiplong >= 2021982208 && $thisiplong <= 2022047743){return true;}
	if($thisiplong >= 2022047744 && $thisiplong <= 2022178815){return true;}
	if($thisiplong >= 2022211584 && $thisiplong <= 2022227967){return true;}
	if($thisiplong >= 2022244352 && $thisiplong <= 2022277119){return true;}
	if($thisiplong >= 2022670336 && $thisiplong <= 2022678527){return true;}
	if($thisiplong >= 2025848832 && $thisiplong <= 2030043135){return true;}
	if($thisiplong >= 2030045184 && $thisiplong <= 2030047231){return true;}
	if($thisiplong >= 2030047232 && $thisiplong <= 2030051327){return true;}
	if($thisiplong >= 2030305280 && $thisiplong <= 2030436351){return true;}
	if($thisiplong >= 2030567424 && $thisiplong <= 2031091711){return true;}
	if($thisiplong >= 2031091712 && $thisiplong <= 2031615999){return true;}
	if($thisiplong >= 2031616000 && $thisiplong <= 2031878143){return true;}
	if($thisiplong >= 2031878144 && $thisiplong <= 2032009215){return true;}
	if($thisiplong >= 2032009216 && $thisiplong <= 2032074751){return true;}
	if($thisiplong >= 2032074752 && $thisiplong <= 2032140287){return true;}
	if($thisiplong >= 2032140288 && $thisiplong <= 2032402431){return true;}
	if($thisiplong >= 2032402432 && $thisiplong <= 2032467967){return true;}
	if($thisiplong >= 2032467968 && $thisiplong <= 2032533503){return true;}
	if($thisiplong >= 2032533504 && $thisiplong <= 2032664575){return true;}
	if($thisiplong >= 2032664576 && $thisiplong <= 2032926719){return true;}
	if($thisiplong >= 2033057792 && $thisiplong <= 2033074175){return true;}
	if($thisiplong >= 2033090560 && $thisiplong <= 2033123327){return true;}
	if($thisiplong >= 2033123328 && $thisiplong <= 2033188863){return true;}
	if($thisiplong >= 2033188864 && $thisiplong <= 2033319935){return true;}
	if($thisiplong >= 2033321984 && $thisiplong <= 2033324031){return true;}
	if($thisiplong >= 2033385472 && $thisiplong <= 2033451007){return true;}
	if($thisiplong >= 2033491968 && $thisiplong <= 2033500159){return true;}
	if($thisiplong >= 2033504256 && $thisiplong <= 2033508351){return true;}
	if($thisiplong >= 2033508352 && $thisiplong <= 2033516543){return true;}
	if($thisiplong >= 2033627136 && $thisiplong <= 2033629183){return true;}
	if($thisiplong >= 2033647616 && $thisiplong <= 2033663999){return true;}
	if($thisiplong >= 2033713152 && $thisiplong <= 2033844223){return true;}
	if($thisiplong >= 2033844224 && $thisiplong <= 2033876991){return true;}
	if($thisiplong >= 2033879040 && $thisiplong <= 2033881087){return true;}
	if($thisiplong >= 2033881088 && $thisiplong <= 2033885183){return true;}
	if($thisiplong >= 2033885184 && $thisiplong <= 2033887231){return true;}
	if($thisiplong >= 2033909760 && $thisiplong <= 2033975295){return true;}
	if($thisiplong >= 2033975296 && $thisiplong <= 2034237439){return true;}
	if($thisiplong >= 2034499584 && $thisiplong <= 2034761727){return true;}
	if($thisiplong >= 2035023872 && $thisiplong <= 2035154943){return true;}
	if($thisiplong >= 2035253248 && $thisiplong <= 2035269631){return true;}
	if($thisiplong >= 2035875840 && $thisiplong <= 2035941375){return true;}
	if($thisiplong >= 2036629504 && $thisiplong <= 2036662271){return true;}
	if($thisiplong >= 2036662272 && $thisiplong <= 2036678655){return true;}
	if($thisiplong >= 2036715520 && $thisiplong <= 2036719615){return true;}
	if($thisiplong >= 2042626048 && $thisiplong <= 2042691583){return true;}
	if($thisiplong >= 2042691584 && $thisiplong <= 2042757119){return true;}
	if($thisiplong >= 2042757120 && $thisiplong <= 2042888191){return true;}
	if($thisiplong >= 2042888192 && $thisiplong <= 2043150335){return true;}
	if($thisiplong >= 2043199488 && $thisiplong <= 2043201535){return true;}
	if($thisiplong >= 2043215872 && $thisiplong <= 2043281407){return true;}
	if($thisiplong >= 2043412480 && $thisiplong <= 2043674623){return true;}
	if($thisiplong >= 2044723200 && $thisiplong <= 2045771775){return true;}
	if($thisiplong >= 2046296064 && $thisiplong <= 2046558207){return true;}
	if($thisiplong >= 2046754816 && $thisiplong <= 2046820351){return true;}
	if($thisiplong >= 2046836736 && $thisiplong <= 2046853119){return true;}
	if($thisiplong >= 2046853120 && $thisiplong <= 2046885887){return true;}
	if($thisiplong >= 2047082496 && $thisiplong <= 2047344639){return true;}
	if($thisiplong >= 2047344640 && $thisiplong <= 2047410175){return true;}
	if($thisiplong >= 2047410176 && $thisiplong <= 2047475711){return true;}
	if($thisiplong >= 2047475712 && $thisiplong <= 2047508479){return true;}
	if($thisiplong >= 2047508480 && $thisiplong <= 2047541247){return true;}
	if($thisiplong >= 2047541248 && $thisiplong <= 2047606783){return true;}
	if($thisiplong >= 2047606784 && $thisiplong <= 2047672319){return true;}
	if($thisiplong >= 2047672320 && $thisiplong <= 2047737855){return true;}
	if($thisiplong >= 2047737856 && $thisiplong <= 2047803391){return true;}
	if($thisiplong >= 2047803392 && $thisiplong <= 2047868927){return true;}
	if($thisiplong >= 2049966080 && $thisiplong <= 2050031615){return true;}
	if($thisiplong >= 2050031616 && $thisiplong <= 2050047999){return true;}
	if($thisiplong >= 2050162688 && $thisiplong <= 2050228223){return true;}
	if($thisiplong >= 2051014656 && $thisiplong <= 2053111807){return true;}
	if($thisiplong >= 2053111808 && $thisiplong <= 2053242879){return true;}
	if($thisiplong >= 2053505024 && $thisiplong <= 2053509119){return true;}
	if($thisiplong >= 2053521408 && $thisiplong <= 2053525503){return true;}
	if($thisiplong >= 2053525504 && $thisiplong <= 2053529599){return true;}
	if($thisiplong >= 2054160384 && $thisiplong <= 2054422527){return true;}
	if($thisiplong >= 2054619136 && $thisiplong <= 2054684671){return true;}
	if($thisiplong >= 2055239680 && $thisiplong <= 2055241727){return true;}
	if($thisiplong >= 2055733248 && $thisiplong <= 2056257535){return true;}
	if($thisiplong >= 2056290304 && $thisiplong <= 2056323071){return true;}
	if($thisiplong >= 2056830976 && $thisiplong <= 2056847359){return true;}
	if($thisiplong >= 2057043968 && $thisiplong <= 2057306111){return true;}
	if($thisiplong >= 2059141120 && $thisiplong <= 2059403263){return true;}
	if($thisiplong >= 2059403264 && $thisiplong <= 2059665407){return true;}
	if($thisiplong >= 2059796480 && $thisiplong <= 2059862015){return true;}
	if($thisiplong >= 2059943936 && $thisiplong <= 2059960319){return true;}
	if($thisiplong >= 2060005376 && $thisiplong <= 2060009471){return true;}
	if($thisiplong >= 2060189696 && $thisiplong <= 2060451839){return true;}
	if($thisiplong >= 2061500416 && $thisiplong <= 2062548991){return true;}
	if($thisiplong >= 2062548992 && $thisiplong <= 2063073279){return true;}
	if($thisiplong >= 2063079424 && $thisiplong <= 2063081471){return true;}
	if($thisiplong >= 2063085568 && $thisiplong <= 2063089663){return true;}
	if($thisiplong >= 2063548416 && $thisiplong <= 2063550463){return true;}
	if($thisiplong >= 2063630336 && $thisiplong <= 2063646719){return true;}
	if($thisiplong >= 2063859712 && $thisiplong <= 2064121855){return true;}
	if($thisiplong >= 2064121856 && $thisiplong <= 2064646143){return true;}
	if($thisiplong >= 2066841600 && $thisiplong <= 2066874367){return true;}
	if($thisiplong >= 2066915328 && $thisiplong <= 2066923519){return true;}
	if($thisiplong >= 2067005440 && $thisiplong <= 2067267583){return true;}
	if($thisiplong >= 2067267584 && $thisiplong <= 2067398655){return true;}
	if($thisiplong >= 2067398656 && $thisiplong <= 2067464191){return true;}
	if($thisiplong >= 2067464192 && $thisiplong <= 2067529727){return true;}
	if($thisiplong >= 2067529728 && $thisiplong <= 2067660799){return true;}
	if($thisiplong >= 2067660800 && $thisiplong <= 2067791871){return true;}
	if($thisiplong >= 2067791872 && $thisiplong <= 2069889023){return true;}
	if($thisiplong >= 2069889024 && $thisiplong <= 2070020095){return true;}
	if($thisiplong >= 2070020096 && $thisiplong <= 2070052863){return true;}
	if($thisiplong >= 2070118400 && $thisiplong <= 2070151167){return true;}
	if($thisiplong >= 2070151168 && $thisiplong <= 2070159359){return true;}
	if($thisiplong >= 2070216704 && $thisiplong <= 2070282239){return true;}
	if($thisiplong >= 2070347776 && $thisiplong <= 2070380543){return true;}
	if($thisiplong >= 2070708224 && $thisiplong <= 2070712319){return true;}
	if($thisiplong >= 2070728704 && $thisiplong <= 2070732799){return true;}
	if($thisiplong >= 2070937600 && $thisiplong <= 2071986175){return true;}
	if($thisiplong >= 2071986176 && $thisiplong <= 2072510463){return true;}
	if($thisiplong >= 2072530944 && $thisiplong <= 2072535039){return true;}
	if($thisiplong >= 2072576000 && $thisiplong <= 2072641535){return true;}
	if($thisiplong >= 2072641536 && $thisiplong <= 2072772607){return true;}
	if($thisiplong >= 2073034752 && $thisiplong <= 2073296895){return true;}
	if($thisiplong >= 2073296896 && $thisiplong <= 2073362431){return true;}
	if($thisiplong >= 2073362432 && $thisiplong <= 2073427967){return true;}
	if($thisiplong >= 2073427968 && $thisiplong <= 2073559039){return true;}
	if($thisiplong >= 2073559040 && $thisiplong <= 2074083327){return true;}
	if($thisiplong >= 2074083328 && $thisiplong <= 2074345471){return true;}
	if($thisiplong >= 2074345472 && $thisiplong <= 2074607615){return true;}
	if($thisiplong >= 2074607616 && $thisiplong <= 2074869759){return true;}
	if($thisiplong >= 2074869760 && $thisiplong <= 2075000831){return true;}
	if($thisiplong >= 2075000832 && $thisiplong <= 2075131903){return true;}
	if($thisiplong >= 2075147264 && $thisiplong <= 2075148287){return true;}
	if($thisiplong >= 2075152384 && $thisiplong <= 2075156479){return true;}
	if($thisiplong >= 2075197440 && $thisiplong <= 2075262975){return true;}
	if($thisiplong >= 2075262976 && $thisiplong <= 2075394047){return true;}
	if($thisiplong >= 2075394048 && $thisiplong <= 2075656191){return true;}
	if($thisiplong >= 2075656192 && $thisiplong <= 2075918335){return true;}
	if($thisiplong >= 2075918336 && $thisiplong <= 2076180479){return true;}
	if($thisiplong >= 2076442624 && $thisiplong <= 2076573695){return true;}
	if($thisiplong >= 2076672000 && $thisiplong <= 2076704767){return true;}
	if($thisiplong >= 2077097984 && $thisiplong <= 2077229055){return true;}
	if($thisiplong >= 2078801920 && $thisiplong <= 2079064063){return true;}
	if($thisiplong >= 2079457280 && $thisiplong <= 2079490047){return true;}
	if($thisiplong >= 2079588352 && $thisiplong <= 2079850495){return true;}
	if($thisiplong >= 2079916032 && $thisiplong <= 2079981567){return true;}
	if($thisiplong >= 2080178176 && $thisiplong <= 2080243711){return true;}
	if($thisiplong >= 2080784384 && $thisiplong <= 2080800767){return true;}
	if($thisiplong >= 2081292288 && $thisiplong <= 2081423359){return true;}
	if($thisiplong >= 2081423360 && $thisiplong <= 2081554431){return true;}
	if($thisiplong >= 2081685504 && $thisiplong <= 2081751039){return true;}
	if($thisiplong >= 2081751040 && $thisiplong <= 2081755135){return true;}
	if($thisiplong >= 2081755136 && $thisiplong <= 2081759231){return true;}
	if($thisiplong >= 2081759232 && $thisiplong <= 2081767423){return true;}
	if($thisiplong >= 2081767424 && $thisiplong <= 2081783807){return true;}
	if($thisiplong >= 2081783808 && $thisiplong <= 2081816575){return true;}
	if($thisiplong >= 2081816576 && $thisiplong <= 2081947647){return true;}
	if($thisiplong >= 2082258944 && $thisiplong <= 2082275327){return true;}
	if($thisiplong >= 2082275328 && $thisiplong <= 2082308095){return true;}
	if($thisiplong >= 2082406400 && $thisiplong <= 2082471935){return true;}
	if($thisiplong >= 2083024896 && $thisiplong <= 2083028991){return true;}
	if($thisiplong >= 2083028992 && $thisiplong <= 2083045375){return true;}
	if($thisiplong >= 2083045376 && $thisiplong <= 2083053567){return true;}
	if($thisiplong >= 2083127296 && $thisiplong <= 2083160063){return true;}
	if($thisiplong >= 2083160064 && $thisiplong <= 2083192831){return true;}
	if($thisiplong >= 2083454976 && $thisiplong <= 2083471359){return true;}
	if($thisiplong >= 2084569088 && $thisiplong <= 2084700159){return true;}
	if($thisiplong >= 2084700160 && $thisiplong <= 2084732927){return true;}
	if($thisiplong >= 2084765696 && $thisiplong <= 2084831231){return true;}
	if($thisiplong >= 2084831232 && $thisiplong <= 2085093375){return true;}
	if($thisiplong >= 2085093376 && $thisiplong <= 2085158911){return true;}
	if($thisiplong >= 2085158912 && $thisiplong <= 2085224447){return true;}
	if($thisiplong >= 2085224448 && $thisiplong <= 2085355519){return true;}
	if($thisiplong >= 2085355520 && $thisiplong <= 2085617663){return true;}
	if($thisiplong >= 2086141952 && $thisiplong <= 2086207487){return true;}
	if($thisiplong >= 2086207488 && $thisiplong <= 2086240255){return true;}
	if($thisiplong >= 2086240256 && $thisiplong <= 2086273023){return true;}
	if($thisiplong >= 2086273024 && $thisiplong <= 2086404095){return true;}
	if($thisiplong >= 2086404096 && $thisiplong <= 2086666239){return true;}
	if($thisiplong >= 2087454720 && $thisiplong <= 2087456767){return true;}
	if($thisiplong >= 2087462912 && $thisiplong <= 2087464959){return true;}
	if($thisiplong >= 2087542784 && $thisiplong <= 2087544831){return true;}
	if($thisiplong >= 2087714816 && $thisiplong <= 2087845887){return true;}
	if($thisiplong >= 2087845888 && $thisiplong <= 2087976959){return true;}
	if($thisiplong >= 2087976960 && $thisiplong <= 2088042495){return true;}
	if($thisiplong >= 2088042496 && $thisiplong <= 2088108031){return true;}
	if($thisiplong >= 2088108032 && $thisiplong <= 2088239103){return true;}
	if($thisiplong >= 2088632320 && $thisiplong <= 2088763391){return true;}
	if($thisiplong >= 2088763392 && $thisiplong <= 2089287679){return true;}
	if($thisiplong >= 2090041344 && $thisiplong <= 2090074111){return true;}
	if($thisiplong >= 2090270720 && $thisiplong <= 2090336255){return true;}
	if($thisiplong >= 2090336256 && $thisiplong <= 2090401791){return true;}
	if($thisiplong >= 2090598400 && $thisiplong <= 2090663935){return true;}
	if($thisiplong >= 2090860544 && $thisiplong <= 2090926079){return true;}
	if($thisiplong >= 2090926080 && $thisiplong <= 2090991615){return true;}
	if($thisiplong >= 2090991616 && $thisiplong <= 2091057151){return true;}
	if($thisiplong >= 2091057152 && $thisiplong <= 2091122687){return true;}
	if($thisiplong >= 2091122688 && $thisiplong <= 2091384831){return true;}
	if($thisiplong >= 2091646976 && $thisiplong <= 2091778047){return true;}
	if($thisiplong >= 2091778048 && $thisiplong <= 2091909119){return true;}
	if($thisiplong >= 2092957696 && $thisiplong <= 2093088767){return true;}
	if($thisiplong >= 2093219840 && $thisiplong <= 2093285375){return true;}
	if($thisiplong >= 2093481984 && $thisiplong <= 2094006271){return true;}
	if($thisiplong >= 2094792704 && $thisiplong <= 2095054847){return true;}
	if($thisiplong >= 2095054848 && $thisiplong <= 2095120383){return true;}
	if($thisiplong >= 2095120384 && $thisiplong <= 2095185919){return true;}
	if($thisiplong >= 2095185920 && $thisiplong <= 2095316991){return true;}
	if($thisiplong >= 2095316992 && $thisiplong <= 2095579135){return true;}
	if($thisiplong >= 2095579136 && $thisiplong <= 2095710207){return true;}
	if($thisiplong >= 2095710208 && $thisiplong <= 2095841279){return true;}
	if($thisiplong >= 2095841280 && $thisiplong <= 2096103423){return true;}
	if($thisiplong >= 2096103424 && $thisiplong <= 2096136191){return true;}
	if($thisiplong >= 2096136192 && $thisiplong <= 2096152575){return true;}
	if($thisiplong >= 2096234496 && $thisiplong <= 2096300031){return true;}
	if($thisiplong >= 2096349184 && $thisiplong <= 2096365567){return true;}
	if($thisiplong >= 2096627712 && $thisiplong <= 2096660479){return true;}
	if($thisiplong >= 2096693248 && $thisiplong <= 2096758783){return true;}
	if($thisiplong >= 2096758784 && $thisiplong <= 2096889855){return true;}
	if($thisiplong >= 2097020928 && $thisiplong <= 2097037311){return true;}
	if($thisiplong >= 2099232768 && $thisiplong <= 2099249151){return true;}
	if($thisiplong >= 2099249152 && $thisiplong <= 2099314687){return true;}
	if($thisiplong >= 2099314688 && $thisiplong <= 2099380223){return true;}
	if($thisiplong >= 2099380224 && $thisiplong <= 2099445759){return true;}
	if($thisiplong >= 2099445760 && $thisiplong <= 2099478527){return true;}
	if($thisiplong >= 2099478528 && $thisiplong <= 2099511295){return true;}
	if($thisiplong >= 2099511296 && $thisiplong <= 2099773439){return true;}
	if($thisiplong >= 2099773440 && $thisiplong <= 2100297727){return true;}
	if($thisiplong >= 2100985856 && $thisiplong <= 2101018623){return true;}
	if($thisiplong >= 2101182464 && $thisiplong <= 2101215231){return true;}
	if($thisiplong >= 2101215232 && $thisiplong <= 2101231615){return true;}
	if($thisiplong >= 2101346304 && $thisiplong <= 2101870591){return true;}
	if($thisiplong >= 2101870592 && $thisiplong <= 2101936127){return true;}
	if($thisiplong >= 2101936128 && $thisiplong <= 2102001663){return true;}
	if($thisiplong >= 2102001664 && $thisiplong <= 2102132735){return true;}
	if($thisiplong >= 2102132736 && $thisiplong <= 2102165503){return true;}
	if($thisiplong >= 2102165504 && $thisiplong <= 2102198271){return true;}
	if($thisiplong >= 2102198272 && $thisiplong <= 2102263807){return true;}
	if($thisiplong >= 2102263808 && $thisiplong <= 2102394879){return true;}
	if($thisiplong >= 2102394880 && $thisiplong <= 2102919167){return true;}
	if($thisiplong >= 2102919168 && $thisiplong <= 2103443455){return true;}
	if($thisiplong >= 2103443456 && $thisiplong <= 2103574527){return true;}
	if($thisiplong >= 2103574528 && $thisiplong <= 2103640063){return true;}
	if($thisiplong >= 2103967744 && $thisiplong <= 2104492031){return true;}
	if($thisiplong >= 2104492032 && $thisiplong <= 2105540607){return true;}
	if($thisiplong >= 2108227584 && $thisiplong <= 2108293119){return true;}
	if($thisiplong >= 2108358656 && $thisiplong <= 2108424191){return true;}
	if($thisiplong >= 2110783488 && $thisiplong <= 2110799871){return true;}
	if($thisiplong >= 2110914560 && $thisiplong <= 2110980095){return true;}
	if($thisiplong >= 2110980096 && $thisiplong <= 2111045631){return true;}
	if($thisiplong >= 2111111168 && $thisiplong <= 2111143935){return true;}
	if($thisiplong >= 2111201280 && $thisiplong <= 2111209471){return true;}
	if($thisiplong >= 2111242240 && $thisiplong <= 2111258623){return true;}
	if($thisiplong >= 2111307776 && $thisiplong <= 2111438847){return true;}
	if($thisiplong >= 2111438848 && $thisiplong <= 2111504383){return true;}
	if($thisiplong >= 2111504384 && $thisiplong <= 2111569919){return true;}
	if($thisiplong >= 2111569920 && $thisiplong <= 2111700991){return true;}
	if($thisiplong >= 2111700992 && $thisiplong <= 2111832063){return true;}
	if($thisiplong >= 2113830912 && $thisiplong <= 2113847295){return true;}
	if($thisiplong >= 2113847296 && $thisiplong <= 2113863679){return true;}
	if($thisiplong >= 2260992000 && $thisiplong <= 2261057535){return true;}
	if($thisiplong >= 2332622848 && $thisiplong <= 2332688383){return true;}
	if($thisiplong >= 2340487168 && $thisiplong <= 2340552703){return true;}
	if($thisiplong >= 2341732352 && $thisiplong <= 2341797887){return true;}
	if($thisiplong >= 2342191104 && $thisiplong <= 2342256639){return true;}
	if($thisiplong >= 2342453248 && $thisiplong <= 2342518783){return true;}
	if($thisiplong >= 2343174144 && $thisiplong <= 2343239679){return true;}
	if($thisiplong >= 2343567360 && $thisiplong <= 2343632895){return true;}
	if($thisiplong >= 2344026112 && $thisiplong <= 2344091647){return true;}
	if($thisiplong >= 2344222720 && $thisiplong <= 2344288255){return true;}
	if($thisiplong >= 2344419328 && $thisiplong <= 2344484863){return true;}
	if($thisiplong >= 2344878080 && $thisiplong <= 2345140223){return true;}
	if($thisiplong >= 2345140224 && $thisiplong <= 2345664511){return true;}
	if($thisiplong >= 2345664512 && $thisiplong <= 2346188799){return true;}
	if($thisiplong >= 2346450944 && $thisiplong <= 2346582015){return true;}
	if($thisiplong >= 2346713088 && $thisiplong <= 2346778623){return true;}
	if($thisiplong >= 2346844160 && $thisiplong <= 2346975231){return true;}
	if($thisiplong >= 2353725440 && $thisiplong <= 2353790975){return true;}
	if($thisiplong >= 2358181888 && $thisiplong <= 2358247423){return true;}
	if($thisiplong >= 2362245120 && $thisiplong <= 2362310655){return true;}
	if($thisiplong >= 2362310656 && $thisiplong <= 2362441727){return true;}
	if($thisiplong >= 2362572800 && $thisiplong <= 2362638335){return true;}
	if($thisiplong >= 2363490304 && $thisiplong <= 2363555839){return true;}
	if($thisiplong >= 2364342272 && $thisiplong <= 2364407807){return true;}
	if($thisiplong >= 2364538880 && $thisiplong <= 2364604415){return true;}
	if($thisiplong >= 2364735488 && $thisiplong <= 2364801023){return true;}
	if($thisiplong >= 2364932096 && $thisiplong <= 2364997631){return true;}
	if($thisiplong >= 2365128704 && $thisiplong <= 2365194239){return true;}
	if($thisiplong >= 2365194240 && $thisiplong <= 2365259775){return true;}
	if($thisiplong >= 2365521920 && $thisiplong <= 2365587455){return true;}
	if($thisiplong >= 2415919104 && $thisiplong <= 2415984639){return true;}
	if($thisiplong >= 2416377856 && $thisiplong <= 2416443391){return true;}
	if($thisiplong >= 2416705536 && $thisiplong <= 2416771071){return true;}
	if($thisiplong >= 2419326976 && $thisiplong <= 2419392511){return true;}
	if($thisiplong >= 2423980032 && $thisiplong <= 2424045567){return true;}
	if($thisiplong >= 2432630784 && $thisiplong <= 2432696319){return true;}
	if($thisiplong >= 2516582400 && $thisiplong <= 2516647935){return true;}
	if($thisiplong >= 2524119040 && $thisiplong <= 2524184575){return true;}
	if($thisiplong >= 2524512256 && $thisiplong <= 2524577791){return true;}
	if($thisiplong >= 2524577792 && $thisiplong <= 2524643327){return true;}
	if($thisiplong >= 2525626368 && $thisiplong <= 2525757439){return true;}
	if($thisiplong >= 2531196928 && $thisiplong <= 2531262463){return true;}
	if($thisiplong >= 2533294080 && $thisiplong <= 2533359615){return true;}
	if($thisiplong >= 2566914048 && $thisiplong <= 2566979583){return true;}
	if($thisiplong >= 2567110656 && $thisiplong <= 2567176191){return true;}
	if($thisiplong >= 2569142272 && $thisiplong <= 2569273343){return true;}
	if($thisiplong >= 2569273344 && $thisiplong <= 2569404415){return true;}
	if($thisiplong >= 2573402112 && $thisiplong <= 2573467647){return true;}
	if($thisiplong >= 2573533184 && $thisiplong <= 2573598719){return true;}
	if($thisiplong >= 2574647296 && $thisiplong <= 2574778367){return true;}
	if($thisiplong >= 2634022912 && $thisiplong <= 2634088447){return true;}
	if($thisiplong >= 2635202560 && $thisiplong <= 2635268095){return true;}
	if($thisiplong >= 2638020608 && $thisiplong <= 2638086143){return true;}
	if($thisiplong >= 2642018304 && $thisiplong <= 2642083839){return true;}
	if($thisiplong >= 2643722240 && $thisiplong <= 2643787775){return true;}
	if($thisiplong >= 2644246528 && $thisiplong <= 2644312063){return true;}
	if($thisiplong >= 2650734592 && $thisiplong <= 2650800127){return true;}
	if($thisiplong >= 2682388480 && $thisiplong <= 2682454015){return true;}
	if($thisiplong >= 2714697728 && $thisiplong <= 2714763263){return true;}
	if($thisiplong >= 2724790272 && $thisiplong <= 2724855807){return true;}
	if($thisiplong >= 2734686208 && $thisiplong <= 2734751743){return true;}
	if($thisiplong >= 2742878208 && $thisiplong <= 2742943743){return true;}
	if($thisiplong >= 2743992320 && $thisiplong <= 2744057855){return true;}
	if($thisiplong >= 2746286080 && $thisiplong <= 2746351615){return true;}
	if($thisiplong >= 2746417152 && $thisiplong <= 2746482687){return true;}
	if($thisiplong >= 2748055552 && $thisiplong <= 2748121087){return true;}
	if($thisiplong >= 2792292352 && $thisiplong <= 2792357887){return true;}
	if($thisiplong >= 2810904576 && $thisiplong <= 2810970111){return true;}
	if($thisiplong >= 2829058048 && $thisiplong <= 2829123583){return true;}
	if($thisiplong >= 2869428224 && $thisiplong <= 2869952511){return true;}
	if($thisiplong >= 2871132160 && $thisiplong <= 2871263231){return true;}
	if($thisiplong >= 2871263232 && $thisiplong <= 2871525375){return true;}
	if($thisiplong >= 2871525376 && $thisiplong <= 2872049663){return true;}
	if($thisiplong >= 2874146816 && $thisiplong <= 2874408959){return true;}
	if($thisiplong >= 2874408960 && $thisiplong <= 2874671103){return true;}
	if($thisiplong >= 2874671104 && $thisiplong <= 2875195391){return true;}
	if($thisiplong >= 2875719680 && $thisiplong <= 2876243967){return true;}
	if($thisiplong >= 2876243968 && $thisiplong <= 2876506111){return true;}
	if($thisiplong >= 2876506112 && $thisiplong <= 2876768255){return true;}
	if($thisiplong >= 2876768256 && $thisiplong <= 2877292543){return true;}
	if($thisiplong >= 2882535424 && $thisiplong <= 2883583999){return true;}
	if($thisiplong >= 2936012800 && $thisiplong <= 2937061375){return true;}
	if($thisiplong >= 2937061376 && $thisiplong <= 2937585663){return true;}
	if($thisiplong >= 2937585664 && $thisiplong <= 2937847807){return true;}
	if($thisiplong >= 2937978880 && $thisiplong <= 2938109951){return true;}
	if($thisiplong >= 2938765312 && $thisiplong <= 2938896383){return true;}
	if($thisiplong >= 2938896384 && $thisiplong <= 2938961919){return true;}
	if($thisiplong >= 2939027456 && $thisiplong <= 2939158527){return true;}
	if($thisiplong >= 2939158528 && $thisiplong <= 2940207103){return true;}
	if($thisiplong >= 2940207104 && $thisiplong <= 2942304255){return true;}
	if($thisiplong >= 2942697472 && $thisiplong <= 2942763007){return true;}
	if($thisiplong >= 2942992384 && $thisiplong <= 2943025151){return true;}
	if($thisiplong >= 2945581056 && $thisiplong <= 2945712127){return true;}
	if($thisiplong >= 2945712128 && $thisiplong <= 2945974271){return true;}
	if($thisiplong >= 2945974272 && $thisiplong <= 2946236415){return true;}
	if($thisiplong >= 2946498560 && $thisiplong <= 2947547135){return true;}
	if($thisiplong >= 2947678208 && $thisiplong <= 2947743743){return true;}
	if($thisiplong >= 2948104192 && $thisiplong <= 2948120575){return true;}
	if($thisiplong >= 2948136960 && $thisiplong <= 2948202495){return true;}
	if($thisiplong >= 2948202496 && $thisiplong <= 2948333567){return true;}
	if($thisiplong >= 2948333568 && $thisiplong <= 2948595711){return true;}
	if($thisiplong >= 3024879616 && $thisiplong <= 3024945151){return true;}
	if($thisiplong >= 3024945152 && $thisiplong <= 3025010687){return true;}
	if($thisiplong >= 3025010688 && $thisiplong <= 3025141759){return true;}
	if($thisiplong >= 3025403904 && $thisiplong <= 3025534975){return true;}
	if($thisiplong >= 3025534976 && $thisiplong <= 3025600511){return true;}
	if($thisiplong >= 3025666048 && $thisiplong <= 3025928191){return true;}
	if($thisiplong >= 3026073600 && $thisiplong <= 3026075647){return true;}
	if($thisiplong >= 3026083840 && $thisiplong <= 3026087935){return true;}
	if($thisiplong >= 3026157568 && $thisiplong <= 3026190335){return true;}
	if($thisiplong >= 3026190336 && $thisiplong <= 3028287487){return true;}
	if($thisiplong >= 3028385792 && $thisiplong <= 3028418559){return true;}
	if($thisiplong >= 3028418560 && $thisiplong <= 3028484095){return true;}
	if($thisiplong >= 3028811776 && $thisiplong <= 3029336063){return true;}
	if($thisiplong >= 3029602304 && $thisiplong <= 3029604351){return true;}
	if($thisiplong >= 3029637120 && $thisiplong <= 3029639167){return true;}
	if($thisiplong >= 3029653504 && $thisiplong <= 3029655551){return true;}
	if($thisiplong >= 3029655552 && $thisiplong <= 3029663743){return true;}
	if($thisiplong >= 3029696512 && $thisiplong <= 3029704703){return true;}
	if($thisiplong >= 3029770240 && $thisiplong <= 3029778431){return true;}
	if($thisiplong >= 3029860352 && $thisiplong <= 3030384639){return true;}
	if($thisiplong >= 3030384640 && $thisiplong <= 3031433215){return true;}
	if($thisiplong >= 3031613440 && $thisiplong <= 3031629823){return true;}
	if($thisiplong >= 3031957504 && $thisiplong <= 3032219647){return true;}
	if($thisiplong >= 3032219648 && $thisiplong <= 3032252415){return true;}
	if($thisiplong >= 3032323072 && $thisiplong <= 3032324095){return true;}
	if($thisiplong >= 3033070592 && $thisiplong <= 3033071615){return true;}
	if($thisiplong >= 3033071616 && $thisiplong <= 3033137151){return true;}
	if($thisiplong >= 3033137152 && $thisiplong <= 3033268223){return true;}
	if($thisiplong >= 3033530368 && $thisiplong <= 3033661439){return true;}
	if($thisiplong >= 3033718784 && $thisiplong <= 3033726975){return true;}
	if($thisiplong >= 3033792512 && $thisiplong <= 3033923583){return true;}
	if($thisiplong >= 3034505216 && $thisiplong <= 3034513407){return true;}
	if($thisiplong >= 3034513408 && $thisiplong <= 3034578943){return true;}
	if($thisiplong >= 3035168768 && $thisiplong <= 3035185151){return true;}
	if($thisiplong >= 3035185152 && $thisiplong <= 3035193343){return true;}
	if($thisiplong >= 3035316224 && $thisiplong <= 3035324415){return true;}
	if($thisiplong >= 3054551040 && $thisiplong <= 3054559231){return true;}
	if($thisiplong >= 3054632960 && $thisiplong <= 3054665727){return true;}
	if($thisiplong >= 3055007744 && $thisiplong <= 3055009791){return true;}
	if($thisiplong >= 3055011840 && $thisiplong <= 3055013887){return true;}
	if($thisiplong >= 3055550464 && $thisiplong <= 3056599039){return true;}
	if($thisiplong >= 3056623616 && $thisiplong <= 3056631807){return true;}
	if($thisiplong >= 3056664576 && $thisiplong <= 3056730111){return true;}
	if($thisiplong >= 3056730112 && $thisiplong <= 3056734207){return true;}
	if($thisiplong >= 3056758784 && $thisiplong <= 3056762879){return true;}
	if($thisiplong >= 3056795648 && $thisiplong <= 3056861183){return true;}
	if($thisiplong >= 3056992256 && $thisiplong <= 3057025023){return true;}
	if($thisiplong >= 3057451008 && $thisiplong <= 3057516543){return true;}
	if($thisiplong >= 3058696192 && $thisiplong <= 3058958335){return true;}
	if($thisiplong >= 3058958336 && $thisiplong <= 3059220479){return true;}
	if($thisiplong >= 3059220480 && $thisiplong <= 3059482623){return true;}
	if($thisiplong >= 3059482624 && $thisiplong <= 3059548159){return true;}
	if($thisiplong >= 3059744768 && $thisiplong <= 3060793343){return true;}
	if($thisiplong >= 3060793344 && $thisiplong <= 3061841919){return true;}
	if($thisiplong >= 3061841920 && $thisiplong <= 3062890495){return true;}
	if($thisiplong >= 3062890496 && $thisiplong <= 3063414783){return true;}
	if($thisiplong >= 3063742464 && $thisiplong <= 3063807999){return true;}
	if($thisiplong >= 3063955456 && $thisiplong <= 3063963647){return true;}
	if($thisiplong >= 3064856576 && $thisiplong <= 3064987647){return true;}
	if($thisiplong >= 3066560512 && $thisiplong <= 3067084799){return true;}
	if($thisiplong >= 3068952576 && $thisiplong <= 3068985343){return true;}
	if($thisiplong >= 3069050880 && $thisiplong <= 3069116415){return true;}
	if($thisiplong >= 3069116416 && $thisiplong <= 3069124607){return true;}
	if($thisiplong >= 3069181952 && $thisiplong <= 3069706239){return true;}
	if($thisiplong >= 3070099456 && $thisiplong <= 3070164991){return true;}
	if($thisiplong >= 3070230528 && $thisiplong <= 3074424831){return true;}
	if($thisiplong >= 3074424832 && $thisiplong <= 3074949119){return true;}
	if($thisiplong >= 3075388416 && $thisiplong <= 3075389439){return true;}
	if($thisiplong >= 3075585024 && $thisiplong <= 3075586047){return true;}
	if($thisiplong >= 3075735552 && $thisiplong <= 3075866623){return true;}
	if($thisiplong >= 3076227072 && $thisiplong <= 3076228095){return true;}
	if($thisiplong >= 3076229120 && $thisiplong <= 3076231167){return true;}
	if($thisiplong >= 3076231168 && $thisiplong <= 3076235263){return true;}
	if($thisiplong >= 3076259840 && $thisiplong <= 3076521983){return true;}
	if($thisiplong >= 3078619136 && $thisiplong <= 3080716287){return true;}
	if($thisiplong >= 3080716288 && $thisiplong <= 3081240575){return true;}
	if($thisiplong >= 3081240576 && $thisiplong <= 3081371647){return true;}
	if($thisiplong >= 3081371648 && $thisiplong <= 3081437183){return true;}
	if($thisiplong >= 3081502720 && $thisiplong <= 3081764863){return true;}
	if($thisiplong >= 3082158080 && $thisiplong <= 3082166271){return true;}
	if($thisiplong >= 3082289152 && $thisiplong <= 3082813439){return true;}
	if($thisiplong >= 3082813440 && $thisiplong <= 3087007743){return true;}
	if($thisiplong >= 3229391360 && $thisiplong <= 3229391615){return true;}
	if($thisiplong >= 3233589760 && $thisiplong <= 3233590015){return true;}
	if($thisiplong >= 3342594048 && $thisiplong <= 3342595071){return true;}
	if($thisiplong >= 3389023232 && $thisiplong <= 3389023743){return true;}
	if($thisiplong >= 3389028864 && $thisiplong <= 3389029375){return true;}
	if($thisiplong >= 3389042688 && $thisiplong <= 3389043711){return true;}
	if($thisiplong >= 3389227008 && $thisiplong <= 3389227519){return true;}
	if($thisiplong >= 3389292544 && $thisiplong <= 3389300735){return true;}
	if($thisiplong >= 3389324288 && $thisiplong <= 3389325311){return true;}
	if($thisiplong >= 3389392384 && $thisiplong <= 3389392895){return true;}
	if($thisiplong >= 3389407744 && $thisiplong <= 3389408255){return true;}
	if($thisiplong >= 3389409280 && $thisiplong <= 3389409791){return true;}
	if($thisiplong >= 3389413120 && $thisiplong <= 3389413375){return true;}
	if($thisiplong >= 3389413376 && $thisiplong <= 3389413887){return true;}
	if($thisiplong >= 3389414400 && $thisiplong <= 3389414911){return true;}
	if($thisiplong >= 3389417216 && $thisiplong <= 3389417471){return true;}
	if($thisiplong >= 3389418496 && $thisiplong <= 3389418751){return true;}
	if($thisiplong >= 3389419008 && $thisiplong <= 3389419519){return true;}
	if($thisiplong >= 3389420032 && $thisiplong <= 3389420287){return true;}
	if($thisiplong >= 3389435904 && $thisiplong <= 3389439999){return true;}
	if($thisiplong >= 3389521920 && $thisiplong <= 3389522175){return true;}
	if($thisiplong >= 3389522432 && $thisiplong <= 3389522943){return true;}
	if($thisiplong >= 3389522944 && $thisiplong <= 3389523455){return true;}
	if($thisiplong >= 3389524992 && $thisiplong <= 3389525247){return true;}
	if($thisiplong >= 3389528064 && $thisiplong <= 3389528319){return true;}
	if($thisiplong >= 3389541632 && $thisiplong <= 3389541887){return true;}
	if($thisiplong >= 3389554688 && $thisiplong <= 3389562879){return true;}
	if($thisiplong >= 3389571072 && $thisiplong <= 3389575167){return true;}
	if($thisiplong >= 3389595648 && $thisiplong <= 3389595903){return true;}
	if($thisiplong >= 3389596160 && $thisiplong <= 3389596671){return true;}
	if($thisiplong >= 3389599744 && $thisiplong <= 3389600255){return true;}
	if($thisiplong >= 3389600512 && $thisiplong <= 3389600767){return true;}
	if($thisiplong >= 3389600768 && $thisiplong <= 3389601279){return true;}
	if($thisiplong >= 3389601280 && $thisiplong <= 3389601535){return true;}
	if($thisiplong >= 3389602304 && $thisiplong <= 3389602815){return true;}
	if($thisiplong >= 3389669376 && $thisiplong <= 3389673471){return true;}
	if($thisiplong >= 3389784320 && $thisiplong <= 3389784575){return true;}
	if($thisiplong >= 3389784576 && $thisiplong <= 3389784831){return true;}
	if($thisiplong >= 3389788416 && $thisiplong <= 3389788671){return true;}
	if($thisiplong >= 3389788672 && $thisiplong <= 3389788927){return true;}
	if($thisiplong >= 3389788928 && $thisiplong <= 3389789183){return true;}
	if($thisiplong >= 3389802496 && $thisiplong <= 3389802751){return true;}
	if($thisiplong >= 3389805568 && $thisiplong <= 3389806079){return true;}
	if($thisiplong >= 3389808640 && $thisiplong <= 3389808895){return true;}
	if($thisiplong >= 3389809152 && $thisiplong <= 3389809663){return true;}
	if($thisiplong >= 3389811200 && $thisiplong <= 3389811455){return true;}
	if($thisiplong >= 3389812480 && $thisiplong <= 3389812735){return true;}
	if($thisiplong >= 3389813760 && $thisiplong <= 3389814015){return true;}
	if($thisiplong >= 3389931520 && $thisiplong <= 3389932031){return true;}
	if($thisiplong >= 3389932800 && $thisiplong <= 3389933055){return true;}
	if($thisiplong >= 3389933824 && $thisiplong <= 3389934079){return true;}
	if($thisiplong >= 3389934080 && $thisiplong <= 3389934591){return true;}
	if($thisiplong >= 3389934592 && $thisiplong <= 3389934847){return true;}
	if($thisiplong >= 3389935104 && $thisiplong <= 3389935615){return true;}
	if($thisiplong >= 3389937664 && $thisiplong <= 3389937919){return true;}
	if($thisiplong >= 3389939968 && $thisiplong <= 3389940223){return true;}
	if($thisiplong >= 3389941760 && $thisiplong <= 3389942271){return true;}
	if($thisiplong >= 3389942784 && $thisiplong <= 3389943295){return true;}
	if($thisiplong >= 3389943552 && $thisiplong <= 3389943807){return true;}
	if($thisiplong >= 3389944320 && $thisiplong <= 3389944831){return true;}
	if($thisiplong >= 3389945344 && $thisiplong <= 3389945855){return true;}
	if($thisiplong >= 3389946880 && $thisiplong <= 3389947391){return true;}
	if($thisiplong >= 3389947648 && $thisiplong <= 3389947903){return true;}
	if($thisiplong >= 3389948160 && $thisiplong <= 3389948415){return true;}
	if($thisiplong >= 3389949696 && $thisiplong <= 3389949951){return true;}
	if($thisiplong >= 3389949952 && $thisiplong <= 3389950207){return true;}
	if($thisiplong >= 3389953280 && $thisiplong <= 3389953535){return true;}
	if($thisiplong >= 3389953792 && $thisiplong <= 3389954047){return true;}
	if($thisiplong >= 3389955328 && $thisiplong <= 3389955583){return true;}
	if($thisiplong >= 3389955584 && $thisiplong <= 3389956095){return true;}
	if($thisiplong >= 3389958400 && $thisiplong <= 3389958655){return true;}
	if($thisiplong >= 3389958656 && $thisiplong <= 3389959167){return true;}
	if($thisiplong >= 3389960192 && $thisiplong <= 3389960447){return true;}
	if($thisiplong >= 3389962240 && $thisiplong <= 3389962751){return true;}
	if($thisiplong >= 3389968384 && $thisiplong <= 3389968895){return true;}
	if($thisiplong >= 3389969664 && $thisiplong <= 3389969919){return true;}
	if($thisiplong >= 3389971200 && $thisiplong <= 3389971455){return true;}
	if($thisiplong >= 3389971456 && $thisiplong <= 3389971711){return true;}
	if($thisiplong >= 3389971968 && $thisiplong <= 3389972479){return true;}
	if($thisiplong >= 3389972736 && $thisiplong <= 3389972991){return true;}
	if($thisiplong >= 3389972992 && $thisiplong <= 3389973503){return true;}
	if($thisiplong >= 3389974272 && $thisiplong <= 3389974527){return true;}
	if($thisiplong >= 3389975296 && $thisiplong <= 3389975551){return true;}
	if($thisiplong >= 3389975552 && $thisiplong <= 3389976063){return true;}
	if($thisiplong >= 3389976064 && $thisiplong <= 3389976319){return true;}
	if($thisiplong >= 3389976320 && $thisiplong <= 3389976575){return true;}
	if($thisiplong >= 3389978112 && $thisiplong <= 3389978367){return true;}
	if($thisiplong >= 3389979392 && $thisiplong <= 3389979647){return true;}
	if($thisiplong >= 3390325248 && $thisiplong <= 3390325503){return true;}
	if($thisiplong >= 3390328576 && $thisiplong <= 3390328831){return true;}
	if($thisiplong >= 3390330624 && $thisiplong <= 3390330879){return true;}
	if($thisiplong >= 3390330880 && $thisiplong <= 3390331391){return true;}
	if($thisiplong >= 3390331392 && $thisiplong <= 3390331647){return true;}
	if($thisiplong >= 3390332416 && $thisiplong <= 3390332927){return true;}
	if($thisiplong >= 3390336000 && $thisiplong <= 3390336255){return true;}
	if($thisiplong >= 3390337536 && $thisiplong <= 3390337791){return true;}
	if($thisiplong >= 3390338304 && $thisiplong <= 3390338559){return true;}
	if($thisiplong >= 3390339072 && $thisiplong <= 3390339327){return true;}
	if($thisiplong >= 3390340352 && $thisiplong <= 3390340607){return true;}
	if($thisiplong >= 3390340864 && $thisiplong <= 3390341119){return true;}
	if($thisiplong >= 3390407424 && $thisiplong <= 3390407679){return true;}
	if($thisiplong >= 3390407680 && $thisiplong <= 3390407935){return true;}
	if($thisiplong >= 3390409984 && $thisiplong <= 3390410239){return true;}
	if($thisiplong >= 3390410240 && $thisiplong <= 3390410495){return true;}
	if($thisiplong >= 3390411520 && $thisiplong <= 3390411775){return true;}
	if($thisiplong >= 3390411776 && $thisiplong <= 3390412031){return true;}
	if($thisiplong >= 3390412288 && $thisiplong <= 3390412799){return true;}
	if($thisiplong >= 3390412800 && $thisiplong <= 3390413311){return true;}
	if($thisiplong >= 3390413312 && $thisiplong <= 3390413567){return true;}
	if($thisiplong >= 3390413824 && $thisiplong <= 3390414079){return true;}
	if($thisiplong >= 3390502912 && $thisiplong <= 3390503935){return true;}
	if($thisiplong >= 3390503936 && $thisiplong <= 3390504959){return true;}
	if($thisiplong >= 3390801920 && $thisiplong <= 3390802431){return true;}
	if($thisiplong >= 3391488000 && $thisiplong <= 3391488511){return true;}
	if($thisiplong >= 3391488512 && $thisiplong <= 3391489023){return true;}
	if($thisiplong >= 3391490048 && $thisiplong <= 3391492095){return true;}
	if($thisiplong >= 3391500288 && $thisiplong <= 3391504383){return true;}
	if($thisiplong >= 3391504384 && $thisiplong <= 3391512575){return true;}
	if($thisiplong >= 3391512576 && $thisiplong <= 3391520767){return true;}
	if($thisiplong >= 3391520768 && $thisiplong <= 3391521279){return true;}
	if($thisiplong >= 3391521280 && $thisiplong <= 3391521791){return true;}
	if($thisiplong >= 3391521792 && $thisiplong <= 3391522303){return true;}
	if($thisiplong >= 3391522304 && $thisiplong <= 3391522559){return true;}
	if($thisiplong >= 3391522560 && $thisiplong <= 3391522815){return true;}
	if($thisiplong >= 3391522816 && $thisiplong <= 3391523327){return true;}
	if($thisiplong >= 3391523328 && $thisiplong <= 3391523583){return true;}
	if($thisiplong >= 3391523840 && $thisiplong <= 3391524351){return true;}
	if($thisiplong >= 3391524352 && $thisiplong <= 3391524863){return true;}
	if($thisiplong >= 3391525376 && $thisiplong <= 3391525887){return true;}
	if($thisiplong >= 3391526144 && $thisiplong <= 3391526399){return true;}
	if($thisiplong >= 3391526400 && $thisiplong <= 3391526911){return true;}
	if($thisiplong >= 3391526912 && $thisiplong <= 3391527423){return true;}
	if($thisiplong >= 3391527424 && $thisiplong <= 3391527935){return true;}
	if($thisiplong >= 3391527936 && $thisiplong <= 3391528191){return true;}
	if($thisiplong >= 3391528448 && $thisiplong <= 3391528959){return true;}
	if($thisiplong >= 3391528960 && $thisiplong <= 3391529471){return true;}
	if($thisiplong >= 3391529984 && $thisiplong <= 3391531007){return true;}
	if($thisiplong >= 3391531008 && $thisiplong <= 3391531519){return true;}
	if($thisiplong >= 3391531520 && $thisiplong <= 3391531775){return true;}
	if($thisiplong >= 3391531776 && $thisiplong <= 3391532031){return true;}
	if($thisiplong >= 3391533056 && $thisiplong <= 3391533567){return true;}
	if($thisiplong >= 3391535104 && $thisiplong <= 3391537151){return true;}
	if($thisiplong >= 3391537152 && $thisiplong <= 3391553535){return true;}
	if($thisiplong >= 3391620096 && $thisiplong <= 3391620607){return true;}
	if($thisiplong >= 3391620864 && $thisiplong <= 3391621119){return true;}
	if($thisiplong >= 3391622912 && $thisiplong <= 3391623167){return true;}
	if($thisiplong >= 3391653632 && $thisiplong <= 3391653887){return true;}
	if($thisiplong >= 3391653888 && $thisiplong <= 3391654143){return true;}
	if($thisiplong >= 3391654912 && $thisiplong <= 3391655167){return true;}
	if($thisiplong >= 3391655680 && $thisiplong <= 3391655935){return true;}
	if($thisiplong >= 3391655936 && $thisiplong <= 3391656447){return true;}
	if($thisiplong >= 3391657472 && $thisiplong <= 3391657727){return true;}
	if($thisiplong >= 3391658752 && $thisiplong <= 3391659007){return true;}
	if($thisiplong >= 3391659008 && $thisiplong <= 3391659263){return true;}
	if($thisiplong >= 3391659520 && $thisiplong <= 3391660031){return true;}
	if($thisiplong >= 3391660544 && $thisiplong <= 3391660799){return true;}
	if($thisiplong >= 3391686656 && $thisiplong <= 3391687167){return true;}
	if($thisiplong >= 3391687424 && $thisiplong <= 3391687679){return true;}
	if($thisiplong >= 3391687680 && $thisiplong <= 3391688191){return true;}
	if($thisiplong >= 3391717376 && $thisiplong <= 3391717631){return true;}
	if($thisiplong >= 3391717888 && $thisiplong <= 3391718399){return true;}
	if($thisiplong >= 3391723520 && $thisiplong <= 3391725567){return true;}
	if($thisiplong >= 3391733760 && $thisiplong <= 3391734015){return true;}
	if($thisiplong >= 3391746048 && $thisiplong <= 3391750143){return true;}
	if($thisiplong >= 3391835136 && $thisiplong <= 3391836159){return true;}
	if($thisiplong >= 3391852544 && $thisiplong <= 3391856639){return true;}
	if($thisiplong >= 3391885312 && $thisiplong <= 3391889407){return true;}
	if($thisiplong >= 3391898368 && $thisiplong <= 3391898623){return true;}
	if($thisiplong >= 3391900160 && $thisiplong <= 3391900415){return true;}
	if($thisiplong >= 3391914240 && $thisiplong <= 3391914495){return true;}
	if($thisiplong >= 3391915008 && $thisiplong <= 3391915519){return true;}
	if($thisiplong >= 3391918592 && $thisiplong <= 3391919103){return true;}
	if($thisiplong >= 3391946752 && $thisiplong <= 3391947263){return true;}
	if($thisiplong >= 3391947264 && $thisiplong <= 3391947519){return true;}
	if($thisiplong >= 3391950592 && $thisiplong <= 3391950847){return true;}
	if($thisiplong >= 3391950848 && $thisiplong <= 3391954943){return true;}
	if($thisiplong >= 3392016384 && $thisiplong <= 3392016895){return true;}
	if($thisiplong >= 3392016896 && $thisiplong <= 3392017151){return true;}
	if($thisiplong >= 3392017408 && $thisiplong <= 3392017919){return true;}
	if($thisiplong >= 3392020480 && $thisiplong <= 3392028671){return true;}
	if($thisiplong >= 3392045056 && $thisiplong <= 3392045311){return true;}
	if($thisiplong >= 3392069632 && $thisiplong <= 3392073727){return true;}
	if($thisiplong >= 3392098816 && $thisiplong <= 3392099327){return true;}
	if($thisiplong >= 3392110080 && $thisiplong <= 3392110335){return true;}
	if($thisiplong >= 3392110592 && $thisiplong <= 3392110847){return true;}
	if($thisiplong >= 3392111104 && $thisiplong <= 3392111615){return true;}
	if($thisiplong >= 3392794624 && $thisiplong <= 3392798719){return true;}
	if($thisiplong >= 3392798720 && $thisiplong <= 3392798975){return true;}
	if($thisiplong >= 3392864256 && $thisiplong <= 3392864511){return true;}
	if($thisiplong >= 3392918528 && $thisiplong <= 3392919551){return true;}
	if($thisiplong >= 3392923648 && $thisiplong <= 3392924159){return true;}
	if($thisiplong >= 3392942080 && $thisiplong <= 3392944127){return true;}
	if($thisiplong >= 3392954368 && $thisiplong <= 3392956415){return true;}
	if($thisiplong >= 3392958464 && $thisiplong <= 3392962559){return true;}
	if($thisiplong >= 3392963584 && $thisiplong <= 3392964607){return true;}
	if($thisiplong >= 3392964608 && $thisiplong <= 3392966655){return true;}
	if($thisiplong >= 3392966656 && $thisiplong <= 3392970751){return true;}
	if($thisiplong >= 3393089536 && $thisiplong <= 3393090559){return true;}
	if($thisiplong >= 3393124352 && $thisiplong <= 3393125375){return true;}
	if($thisiplong >= 3393125376 && $thisiplong <= 3393125631){return true;}
	if($thisiplong >= 3393126144 && $thisiplong <= 3393126399){return true;}
	if($thisiplong >= 3393147136 && $thisiplong <= 3393147391){return true;}
	if($thisiplong >= 3393147392 && $thisiplong <= 3393147903){return true;}
	if($thisiplong >= 3393147904 && $thisiplong <= 3393148927){return true;}
	if($thisiplong >= 3393148928 && $thisiplong <= 3393150975){return true;}
	if($thisiplong >= 3393167360 && $thisiplong <= 3393175551){return true;}
	if($thisiplong >= 3393189888 && $thisiplong <= 3393190911){return true;}
	if($thisiplong >= 3393257472 && $thisiplong <= 3393259519){return true;}
	if($thisiplong >= 3393259520 && $thisiplong <= 3393260031){return true;}
	if($thisiplong >= 3393388544 && $thisiplong <= 3393389567){return true;}
	if($thisiplong >= 3393520640 && $thisiplong <= 3393521663){return true;}
	if($thisiplong >= 3393523712 && $thisiplong <= 3393527807){return true;}
	if($thisiplong >= 3393585152 && $thisiplong <= 3393593343){return true;}
	if($thisiplong >= 3393609728 && $thisiplong <= 3393613823){return true;}
	if($thisiplong >= 3393634304 && $thisiplong <= 3393638399){return true;}
	if($thisiplong >= 3393726464 && $thisiplong <= 3393728511){return true;}
	if($thisiplong >= 3393736704 && $thisiplong <= 3393740799){return true;}
	if($thisiplong >= 3393814528 && $thisiplong <= 3393815551){return true;}
	if($thisiplong >= 3393849344 && $thisiplong <= 3393851391){return true;}
	if($thisiplong >= 3393867776 && $thisiplong <= 3393871871){return true;}
	if($thisiplong >= 3393912320 && $thisiplong <= 3393912831){return true;}
	if($thisiplong >= 3393966080 && $thisiplong <= 3393970175){return true;}
	if($thisiplong >= 3393977344 && $thisiplong <= 3393978367){return true;}
	if($thisiplong >= 3394042880 && $thisiplong <= 3394043903){return true;}
	if($thisiplong >= 3394064384 && $thisiplong <= 3394066431){return true;}
	if($thisiplong >= 3394067456 && $thisiplong <= 3394068479){return true;}
	if($thisiplong >= 3394111488 && $thisiplong <= 3394113535){return true;}
	if($thisiplong >= 3394232320 && $thisiplong <= 3394234367){return true;}
	if($thisiplong >= 3394238464 && $thisiplong <= 3394239487){return true;}
	if($thisiplong >= 3394289664 && $thisiplong <= 3394291711){return true;}
	if($thisiplong >= 3394291712 && $thisiplong <= 3394293759){return true;}
	if($thisiplong >= 3394306048 && $thisiplong <= 3394307071){return true;}
	if($thisiplong >= 3394501632 && $thisiplong <= 3394502655){return true;}
	if($thisiplong >= 3394503680 && $thisiplong <= 3394504703){return true;}
	if($thisiplong >= 3394504704 && $thisiplong <= 3394506751){return true;}
	if($thisiplong >= 3394508800 && $thisiplong <= 3394510847){return true;}
	if($thisiplong >= 3394621440 && $thisiplong <= 3394625535){return true;}
	if($thisiplong >= 3394697472 && $thisiplong <= 3394697727){return true;}
	if($thisiplong >= 3394698240 && $thisiplong <= 3394699263){return true;}
	if($thisiplong >= 3394719744 && $thisiplong <= 3394723839){return true;}
	if($thisiplong >= 3394832384 && $thisiplong <= 3394834431){return true;}
	if($thisiplong >= 3394895872 && $thisiplong <= 3394896895){return true;}
	if($thisiplong >= 3394924544 && $thisiplong <= 3394928639){return true;}
	if($thisiplong >= 3394946048 && $thisiplong <= 3394946303){return true;}
	if($thisiplong >= 3394953216 && $thisiplong <= 3394957311){return true;}
	if($thisiplong >= 3394961408 && $thisiplong <= 3394962431){return true;}
	if($thisiplong >= 3394985984 && $thisiplong <= 3394990079){return true;}
	if($thisiplong >= 3394994176 && $thisiplong <= 3394995199){return true;}
	if($thisiplong >= 3395006464 && $thisiplong <= 3395010559){return true;}
	if($thisiplong >= 3395018752 && $thisiplong <= 3395026943){return true;}
	if($thisiplong >= 3395026944 && $thisiplong <= 3395027967){return true;}
	if($thisiplong >= 3395028992 && $thisiplong <= 3395031039){return true;}
	if($thisiplong >= 3395039232 && $thisiplong <= 3395043327){return true;}
	if($thisiplong >= 3395091456 && $thisiplong <= 3395092479){return true;}
	if($thisiplong >= 3395092480 && $thisiplong <= 3395093503){return true;}
	if($thisiplong >= 3395156992 && $thisiplong <= 3395158015){return true;}
	if($thisiplong >= 3395181568 && $thisiplong <= 3395182591){return true;}
	if($thisiplong >= 3395223552 && $thisiplong <= 3395224575){return true;}
	if($thisiplong >= 3395224576 && $thisiplong <= 3395225599){return true;}
	if($thisiplong >= 3395225600 && $thisiplong <= 3395227647){return true;}
	if($thisiplong >= 3395227648 && $thisiplong <= 3395231743){return true;}
	if($thisiplong >= 3395284992 && $thisiplong <= 3395287039){return true;}
	if($thisiplong >= 3395288064 && $thisiplong <= 3395289087){return true;}
	if($thisiplong >= 3395289088 && $thisiplong <= 3395305471){return true;}
	if($thisiplong >= 3395305472 && $thisiplong <= 3395307519){return true;}
	if($thisiplong >= 3395307520 && $thisiplong <= 3395309567){return true;}
	if($thisiplong >= 3395309568 && $thisiplong <= 3395313663){return true;}
	if($thisiplong >= 3395313664 && $thisiplong <= 3395315711){return true;}
	if($thisiplong >= 3395315712 && $thisiplong <= 3395317759){return true;}
	if($thisiplong >= 3395317760 && $thisiplong <= 3395321855){return true;}
	if($thisiplong >= 3395321856 && $thisiplong <= 3395323903){return true;}
	if($thisiplong >= 3395323904 && $thisiplong <= 3395325951){return true;}
	if($thisiplong >= 3395325952 && $thisiplong <= 3395330047){return true;}
	if($thisiplong >= 3395330048 && $thisiplong <= 3395332095){return true;}
	if($thisiplong >= 3395332096 && $thisiplong <= 3395334143){return true;}
	if($thisiplong >= 3395334144 && $thisiplong <= 3395338239){return true;}
	if($thisiplong >= 3395338240 && $thisiplong <= 3395340287){return true;}
	if($thisiplong >= 3395340288 && $thisiplong <= 3395342335){return true;}
	if($thisiplong >= 3395342336 && $thisiplong <= 3395346431){return true;}
	if($thisiplong >= 3395346432 && $thisiplong <= 3395348479){return true;}
	if($thisiplong >= 3395348480 && $thisiplong <= 3395350527){return true;}
	if($thisiplong >= 3395350528 && $thisiplong <= 3395354623){return true;}
	if($thisiplong >= 3395354624 && $thisiplong <= 3395356671){return true;}
	if($thisiplong >= 3395356672 && $thisiplong <= 3395358719){return true;}
	if($thisiplong >= 3395358720 && $thisiplong <= 3395362815){return true;}
	if($thisiplong >= 3395362816 && $thisiplong <= 3395371007){return true;}
	if($thisiplong >= 3395371008 && $thisiplong <= 3395379199){return true;}
	if($thisiplong >= 3395379200 && $thisiplong <= 3395383295){return true;}
	if($thisiplong >= 3395383296 && $thisiplong <= 3395387391){return true;}
	if($thisiplong >= 3395387392 && $thisiplong <= 3395403775){return true;}
	if($thisiplong >= 3395403776 && $thisiplong <= 3395411967){return true;}
	if($thisiplong >= 3395411968 && $thisiplong <= 3395414015){return true;}
	if($thisiplong >= 3395414016 && $thisiplong <= 3395416063){return true;}
	if($thisiplong >= 3395416064 && $thisiplong <= 3395420159){return true;}
	if($thisiplong >= 3395420160 && $thisiplong <= 3395422207){return true;}
	if($thisiplong >= 3395422208 && $thisiplong <= 3395424255){return true;}
	if($thisiplong >= 3395424256 && $thisiplong <= 3395428351){return true;}
	if($thisiplong >= 3395428352 && $thisiplong <= 3395430399){return true;}
	if($thisiplong >= 3395430400 && $thisiplong <= 3395432447){return true;}
	if($thisiplong >= 3395432448 && $thisiplong <= 3395436543){return true;}
	if($thisiplong >= 3395436544 && $thisiplong <= 3395444735){return true;}
	if($thisiplong >= 3395444736 && $thisiplong <= 3395446783){return true;}
	if($thisiplong >= 3395446784 && $thisiplong <= 3395448831){return true;}
	if($thisiplong >= 3395448832 && $thisiplong <= 3395452927){return true;}
	if($thisiplong >= 3395452928 && $thisiplong <= 3395461119){return true;}
	if($thisiplong >= 3395461120 && $thisiplong <= 3395463167){return true;}
	if($thisiplong >= 3395463168 && $thisiplong <= 3395465215){return true;}
	if($thisiplong >= 3395465216 && $thisiplong <= 3395469311){return true;}
	if($thisiplong >= 3395469312 && $thisiplong <= 3395471359){return true;}
	if($thisiplong >= 3395471360 && $thisiplong <= 3395473407){return true;}
	if($thisiplong >= 3395473408 && $thisiplong <= 3395477503){return true;}
	if($thisiplong >= 3395477504 && $thisiplong <= 3395479551){return true;}
	if($thisiplong >= 3395479552 && $thisiplong <= 3395481599){return true;}
	if($thisiplong >= 3395481600 && $thisiplong <= 3395485695){return true;}
	if($thisiplong >= 3395485696 && $thisiplong <= 3395502079){return true;}
	if($thisiplong >= 3395502080 && $thisiplong <= 3395510271){return true;}
	if($thisiplong >= 3395510272 && $thisiplong <= 3395512319){return true;}
	if($thisiplong >= 3395512320 && $thisiplong <= 3395514367){return true;}
	if($thisiplong >= 3395514368 && $thisiplong <= 3395518463){return true;}
	if($thisiplong >= 3395518464 && $thisiplong <= 3395526655){return true;}
	if($thisiplong >= 3395526656 && $thisiplong <= 3395528703){return true;}
	if($thisiplong >= 3395528704 && $thisiplong <= 3395530751){return true;}
	if($thisiplong >= 3395530752 && $thisiplong <= 3395534847){return true;}
	if($thisiplong >= 3395534848 && $thisiplong <= 3395536895){return true;}
	if($thisiplong >= 3395536896 && $thisiplong <= 3395538943){return true;}
	if($thisiplong >= 3395538944 && $thisiplong <= 3395543039){return true;}
	if($thisiplong >= 3395543040 && $thisiplong <= 3395545087){return true;}
	if($thisiplong >= 3395545088 && $thisiplong <= 3395547135){return true;}
	if($thisiplong >= 3395547136 && $thisiplong <= 3395551231){return true;}
	if($thisiplong >= 3395551232 && $thisiplong <= 3395553279){return true;}
	if($thisiplong >= 3395553280 && $thisiplong <= 3395555327){return true;}
	if($thisiplong >= 3395555328 && $thisiplong <= 3395559423){return true;}
	if($thisiplong >= 3395559424 && $thisiplong <= 3395567615){return true;}
	if($thisiplong >= 3395567616 && $thisiplong <= 3395569663){return true;}
	if($thisiplong >= 3395569664 && $thisiplong <= 3395571711){return true;}
	if($thisiplong >= 3395571712 && $thisiplong <= 3395575807){return true;}
	if($thisiplong >= 3395575808 && $thisiplong <= 3395577855){return true;}
	if($thisiplong >= 3395577856 && $thisiplong <= 3395579903){return true;}
	if($thisiplong >= 3395579904 && $thisiplong <= 3395583999){return true;}
	if($thisiplong >= 3395584000 && $thisiplong <= 3395586047){return true;}
	if($thisiplong >= 3395586048 && $thisiplong <= 3395588095){return true;}
	if($thisiplong >= 3395588096 && $thisiplong <= 3395592191){return true;}
	if($thisiplong >= 3395592192 && $thisiplong <= 3395594239){return true;}
	if($thisiplong >= 3395594240 && $thisiplong <= 3395596287){return true;}
	if($thisiplong >= 3395596288 && $thisiplong <= 3395600383){return true;}
	if($thisiplong >= 3395600384 && $thisiplong <= 3395602431){return true;}
	if($thisiplong >= 3395602432 && $thisiplong <= 3395604479){return true;}
	if($thisiplong >= 3395604480 && $thisiplong <= 3395608575){return true;}
	if($thisiplong >= 3395608576 && $thisiplong <= 3395616767){return true;}
	if($thisiplong >= 3395616768 && $thisiplong <= 3395633151){return true;}
	if($thisiplong >= 3395633152 && $thisiplong <= 3395641343){return true;}
	if($thisiplong >= 3395641344 && $thisiplong <= 3395649535){return true;}
	if($thisiplong >= 3395649536 && $thisiplong <= 3395665919){return true;}
	if($thisiplong >= 3395665920 && $thisiplong <= 3395674111){return true;}
	if($thisiplong >= 3395674112 && $thisiplong <= 3395676159){return true;}
	if($thisiplong >= 3395676160 && $thisiplong <= 3395678207){return true;}
	if($thisiplong >= 3395678208 && $thisiplong <= 3395682303){return true;}
	if($thisiplong >= 3395682304 && $thisiplong <= 3395690495){return true;}
	if($thisiplong >= 3395690496 && $thisiplong <= 3395698687){return true;}
	if($thisiplong >= 3395698688 && $thisiplong <= 3395715071){return true;}
	if($thisiplong >= 3395715072 && $thisiplong <= 3395717119){return true;}
	if($thisiplong >= 3395717120 && $thisiplong <= 3395719167){return true;}
	if($thisiplong >= 3395719168 && $thisiplong <= 3395723263){return true;}
	if($thisiplong >= 3395723264 && $thisiplong <= 3395731455){return true;}
	if($thisiplong >= 3395731456 && $thisiplong <= 3395733503){return true;}
	if($thisiplong >= 3395733504 && $thisiplong <= 3395735551){return true;}
	if($thisiplong >= 3395735552 && $thisiplong <= 3395739647){return true;}
	if($thisiplong >= 3395739648 && $thisiplong <= 3395741695){return true;}
	if($thisiplong >= 3395741696 && $thisiplong <= 3395743743){return true;}
	if($thisiplong >= 3395743744 && $thisiplong <= 3395747839){return true;}
	if($thisiplong >= 3395747840 && $thisiplong <= 3395749887){return true;}
	if($thisiplong >= 3395749888 && $thisiplong <= 3395751935){return true;}
	if($thisiplong >= 3395751936 && $thisiplong <= 3395756031){return true;}
	if($thisiplong >= 3395756032 && $thisiplong <= 3395764223){return true;}
	if($thisiplong >= 3395764224 && $thisiplong <= 3395772415){return true;}
	if($thisiplong >= 3395772416 && $thisiplong <= 3395774463){return true;}
	if($thisiplong >= 3395774464 && $thisiplong <= 3395776511){return true;}
	if($thisiplong >= 3395776512 && $thisiplong <= 3395780607){return true;}
	if($thisiplong >= 3395780608 && $thisiplong <= 3395796991){return true;}
	if($thisiplong >= 3395796992 && $thisiplong <= 3395805183){return true;}
	if($thisiplong >= 3395805184 && $thisiplong <= 3395807231){return true;}
	if($thisiplong >= 3395807232 && $thisiplong <= 3395809279){return true;}
	if($thisiplong >= 3395809280 && $thisiplong <= 3395813375){return true;}
	if($thisiplong >= 3395813376 && $thisiplong <= 3395944447){return true;}
	if($thisiplong >= 3395944448 && $thisiplong <= 3396009983){return true;}
	if($thisiplong >= 3396009984 && $thisiplong <= 3396042751){return true;}
	if($thisiplong >= 3396042752 && $thisiplong <= 3396075519){return true;}
	if($thisiplong >= 3396075520 && $thisiplong <= 3396141055){return true;}
	if($thisiplong >= 3396141056 && $thisiplong <= 3396206591){return true;}
	if($thisiplong >= 3396206592 && $thisiplong <= 3396222975){return true;}
	if($thisiplong >= 3396222976 && $thisiplong <= 3396239359){return true;}
	if($thisiplong >= 3396239360 && $thisiplong <= 3396255743){return true;}
	if($thisiplong >= 3396255744 && $thisiplong <= 3396272127){return true;}
	if($thisiplong >= 3396272128 && $thisiplong <= 3396304895){return true;}
	if($thisiplong >= 3396304896 && $thisiplong <= 3396313087){return true;}
	if($thisiplong >= 3396313088 && $thisiplong <= 3396321279){return true;}
	if($thisiplong >= 3396321280 && $thisiplong <= 3396337663){return true;}
	if($thisiplong >= 3396337664 && $thisiplong <= 3396403199){return true;}
	if($thisiplong >= 3396403200 && $thisiplong <= 3396407295){return true;}
	if($thisiplong >= 3396407296 && $thisiplong <= 3396411391){return true;}
	if($thisiplong >= 3396411392 && $thisiplong <= 3396419583){return true;}
	if($thisiplong >= 3396419584 && $thisiplong <= 3396435967){return true;}
	if($thisiplong >= 3396435968 && $thisiplong <= 3396452351){return true;}
	if($thisiplong >= 3396452352 && $thisiplong <= 3396460543){return true;}
	if($thisiplong >= 3396460544 && $thisiplong <= 3396464639){return true;}
	if($thisiplong >= 3396464640 && $thisiplong <= 3396468735){return true;}
	if($thisiplong >= 3396468736 && $thisiplong <= 3396476927){return true;}
	if($thisiplong >= 3396476928 && $thisiplong <= 3396485119){return true;}
	if($thisiplong >= 3396485120 && $thisiplong <= 3396501503){return true;}
	if($thisiplong >= 3396501504 && $thisiplong <= 3396534271){return true;}
	if($thisiplong >= 3396534272 && $thisiplong <= 3396542463){return true;}
	if($thisiplong >= 3396542464 && $thisiplong <= 3396550655){return true;}
	if($thisiplong >= 3396550656 && $thisiplong <= 3396567039){return true;}
	if($thisiplong >= 3396567040 && $thisiplong <= 3396599807){return true;}
	if($thisiplong >= 3396599808 && $thisiplong <= 3396607999){return true;}
	if($thisiplong >= 3396608000 && $thisiplong <= 3396612095){return true;}
	if($thisiplong >= 3396612096 && $thisiplong <= 3396616191){return true;}
	if($thisiplong >= 3396616192 && $thisiplong <= 3396624383){return true;}
	if($thisiplong >= 3396624384 && $thisiplong <= 3396632575){return true;}
	if($thisiplong >= 3396632576 && $thisiplong <= 3396665343){return true;}
	if($thisiplong >= 3396665344 && $thisiplong <= 3396681727){return true;}
	if($thisiplong >= 3396681728 && $thisiplong <= 3396698111){return true;}
	if($thisiplong >= 3396698112 && $thisiplong <= 3396730879){return true;}
	if($thisiplong >= 3396730880 && $thisiplong <= 3396739071){return true;}
	if($thisiplong >= 3396739072 && $thisiplong <= 3396747263){return true;}
	if($thisiplong >= 3396747264 && $thisiplong <= 3396763647){return true;}
	if($thisiplong >= 3396763648 && $thisiplong <= 3396796415){return true;}
	if($thisiplong >= 3396796416 && $thisiplong <= 3396804607){return true;}
	if($thisiplong >= 3396804608 && $thisiplong <= 3396812799){return true;}
	if($thisiplong >= 3396812800 && $thisiplong <= 3396816895){return true;}
	if($thisiplong >= 3396816896 && $thisiplong <= 3396820991){return true;}
	if($thisiplong >= 3396820992 && $thisiplong <= 3396829183){return true;}
	if($thisiplong >= 3396829184 && $thisiplong <= 3396861951){return true;}
	if($thisiplong >= 3396861952 && $thisiplong <= 3396878335){return true;}
	if($thisiplong >= 3396878336 && $thisiplong <= 3396894719){return true;}
	if($thisiplong >= 3396894720 && $thisiplong <= 3396927487){return true;}
	if($thisiplong >= 3396927488 && $thisiplong <= 3396993023){return true;}
	if($thisiplong >= 3396993024 && $thisiplong <= 3396995071){return true;}
	if($thisiplong >= 3397001216 && $thisiplong <= 3397003263){return true;}
	if($thisiplong >= 3397009408 && $thisiplong <= 3397017599){return true;}
	if($thisiplong >= 3397021696 && $thisiplong <= 3397023743){return true;}
	if($thisiplong >= 3397023744 && $thisiplong <= 3397025791){return true;}
	if($thisiplong >= 3397025792 && $thisiplong <= 3397026047){return true;}
	if($thisiplong >= 3397026816 && $thisiplong <= 3397027071){return true;}
	if($thisiplong >= 3397083136 && $thisiplong <= 3397087231){return true;}
	if($thisiplong >= 3397128192 && $thisiplong <= 3397130239){return true;}
	if($thisiplong >= 3397130240 && $thisiplong <= 3397131263){return true;}
	if($thisiplong >= 3397218304 && $thisiplong <= 3397222399){return true;}
	if($thisiplong >= 3397234688 && $thisiplong <= 3397238783){return true;}
	if($thisiplong >= 3397320704 && $thisiplong <= 3397321215){return true;}
	if($thisiplong >= 3397321216 && $thisiplong <= 3397321471){return true;}
	if($thisiplong >= 3397321472 && $thisiplong <= 3397321727){return true;}
	if($thisiplong >= 3397321728 && $thisiplong <= 3397321983){return true;}
	if($thisiplong >= 3397321984 && $thisiplong <= 3397322239){return true;}
	if($thisiplong >= 3397322240 && $thisiplong <= 3397322751){return true;}
	if($thisiplong >= 3397323776 && $thisiplong <= 3397324799){return true;}
	if($thisiplong >= 3397324800 && $thisiplong <= 3397328895){return true;}
	if($thisiplong >= 3397330944 && $thisiplong <= 3397332991){return true;}
	if($thisiplong >= 3397332992 && $thisiplong <= 3397337087){return true;}
	if($thisiplong >= 3397349376 && $thisiplong <= 3397353471){return true;}
	if($thisiplong >= 3397353472 && $thisiplong <= 3397357567){return true;}
	if($thisiplong >= 3397357568 && $thisiplong <= 3397361663){return true;}
	if($thisiplong >= 3397361664 && $thisiplong <= 3397363711){return true;}
	if($thisiplong >= 3397369856 && $thisiplong <= 3397370367){return true;}
	if($thisiplong >= 3397370368 && $thisiplong <= 3397370879){return true;}
	if($thisiplong >= 3397370880 && $thisiplong <= 3397371903){return true;}
	if($thisiplong >= 3397371904 && $thisiplong <= 3397373951){return true;}
	if($thisiplong >= 3397373952 && $thisiplong <= 3397374207){return true;}
	if($thisiplong >= 3397374208 && $thisiplong <= 3397374463){return true;}
	if($thisiplong >= 3397374976 && $thisiplong <= 3397375999){return true;}
	if($thisiplong >= 3397376000 && $thisiplong <= 3397378047){return true;}
	if($thisiplong >= 3397378048 && $thisiplong <= 3397386239){return true;}
	if($thisiplong >= 3397517312 && $thisiplong <= 3397525503){return true;}
	if($thisiplong >= 3397574656 && $thisiplong <= 3397582847){return true;}
	if($thisiplong >= 3397586944 && $thisiplong <= 3397588991){return true;}
	if($thisiplong >= 3397595136 && $thisiplong <= 3397599231){return true;}
	if($thisiplong >= 3397636096 && $thisiplong <= 3397640191){return true;}
	if($thisiplong >= 3397722112 && $thisiplong <= 3397726207){return true;}
	if($thisiplong >= 3397794304 && $thisiplong <= 3397794559){return true;}
	if($thisiplong >= 3397812224 && $thisiplong <= 3397816319){return true;}
	if($thisiplong >= 3397922816 && $thisiplong <= 3397926911){return true;}
	if($thisiplong >= 3397963776 && $thisiplong <= 3397967871){return true;}
	if($thisiplong >= 3397967872 && $thisiplong <= 3397971967){return true;}
	if($thisiplong >= 3398035200 && $thisiplong <= 3398035455){return true;}
	if($thisiplong >= 3398279168 && $thisiplong <= 3398287359){return true;}
	if($thisiplong >= 3398307840 && $thisiplong <= 3398311935){return true;}
	if($thisiplong >= 3398370304 && $thisiplong <= 3398371327){return true;}
	if($thisiplong >= 3398373376 && $thisiplong <= 3398377471){return true;}
	if($thisiplong >= 3398377472 && $thisiplong <= 3398381567){return true;}
	if($thisiplong >= 3398383616 && $thisiplong <= 3398385663){return true;}
	if($thisiplong >= 3398606848 && $thisiplong <= 3398610943){return true;}
	if($thisiplong >= 3398614016 && $thisiplong <= 3398615039){return true;}
	if($thisiplong >= 3398616064 && $thisiplong <= 3398617087){return true;}
	if($thisiplong >= 3398617088 && $thisiplong <= 3398619135){return true;}
	if($thisiplong >= 3398668288 && $thisiplong <= 3398672383){return true;}
	if($thisiplong >= 3398705152 && $thisiplong <= 3398709247){return true;}
	if($thisiplong >= 3398713344 && $thisiplong <= 3398721535){return true;}
	if($thisiplong >= 3398721536 && $thisiplong <= 3398729727){return true;}
	if($thisiplong >= 3398770688 && $thisiplong <= 3398778879){return true;}
	if($thisiplong >= 3398803456 && $thisiplong <= 3398811647){return true;}
	if($thisiplong >= 3398819840 && $thisiplong <= 3398828031){return true;}
	if($thisiplong >= 3398832128 && $thisiplong <= 3398836223){return true;}
	if($thisiplong >= 3398836224 && $thisiplong <= 3398840319){return true;}
	if($thisiplong >= 3398842368 && $thisiplong <= 3398843391){return true;}
	if($thisiplong >= 3398877184 && $thisiplong <= 3398881279){return true;}
	if($thisiplong >= 3398885376 && $thisiplong <= 3398893567){return true;}
	if($thisiplong >= 3398893568 && $thisiplong <= 3398894591){return true;}
	if($thisiplong >= 3398926336 && $thisiplong <= 3398934527){return true;}
	if($thisiplong >= 3399004160 && $thisiplong <= 3399008255){return true;}
	if($thisiplong >= 3399024640 && $thisiplong <= 3399025663){return true;}
	if($thisiplong >= 3399036928 && $thisiplong <= 3399041023){return true;}
	if($thisiplong >= 3399335936 && $thisiplong <= 3399344127){return true;}
	if($thisiplong >= 3399393280 && $thisiplong <= 3399401471){return true;}
	if($thisiplong >= 3399528448 && $thisiplong <= 3399532543){return true;}
	if($thisiplong >= 3399631616 && $thisiplong <= 3399631871){return true;}
	if($thisiplong >= 3399633664 && $thisiplong <= 3399633919){return true;}
	if($thisiplong >= 3399745536 && $thisiplong <= 3399749631){return true;}
	if($thisiplong >= 3399751936 && $thisiplong <= 3399752191){return true;}
	if($thisiplong >= 3399770112 && $thisiplong <= 3399778303){return true;}
	if($thisiplong >= 3399835648 && $thisiplong <= 3399839743){return true;}
	if($thisiplong >= 3399856128 && $thisiplong <= 3399860223){return true;}
	if($thisiplong >= 3399864320 && $thisiplong <= 3399868415){return true;}
	if($thisiplong >= 3399872256 && $thisiplong <= 3399872511){return true;}
	if($thisiplong >= 3399872512 && $thisiplong <= 3399873023){return true;}
	if($thisiplong >= 3399873280 && $thisiplong <= 3399873535){return true;}
	if($thisiplong >= 3399873792 && $thisiplong <= 3399874047){return true;}
	if($thisiplong >= 3399875328 && $thisiplong <= 3399875583){return true;}
	if($thisiplong >= 3399875584 && $thisiplong <= 3399876607){return true;}
	if($thisiplong >= 3399933952 && $thisiplong <= 3399942143){return true;}
	if($thisiplong >= 3400048640 && $thisiplong <= 3400052735){return true;}
	if($thisiplong >= 3400052736 && $thisiplong <= 3400056831){return true;}
	if($thisiplong >= 3400171520 && $thisiplong <= 3400179711){return true;}
	if($thisiplong >= 3400194048 && $thisiplong <= 3400196095){return true;}
	if($thisiplong >= 3400196096 && $thisiplong <= 3400204287){return true;}
	if($thisiplong >= 3400259584 && $thisiplong <= 3400261631){return true;}
	if($thisiplong >= 3400264448 && $thisiplong <= 3400264703){return true;}
	if($thisiplong >= 3400269824 && $thisiplong <= 3400270847){return true;}
	if($thisiplong >= 3400335360 && $thisiplong <= 3400336383){return true;}
	if($thisiplong >= 3400337408 && $thisiplong <= 3400339455){return true;}
	if($thisiplong >= 3400392704 && $thisiplong <= 3400400895){return true;}
	if($thisiplong >= 3400417280 && $thisiplong <= 3400421375){return true;}
	if($thisiplong >= 3400589312 && $thisiplong <= 3400597503){return true;}
	if($thisiplong >= 3400790016 && $thisiplong <= 3400794111){return true;}
	if($thisiplong >= 3400826880 && $thisiplong <= 3400835071){return true;}
	if($thisiplong >= 3400847360 && $thisiplong <= 3400849407){return true;}
	if($thisiplong >= 3400888320 && $thisiplong <= 3400892415){return true;}
	if($thisiplong >= 3400933376 && $thisiplong <= 3400937471){return true;}
	if($thisiplong >= 3400974336 && $thisiplong <= 3400982527){return true;}
	if($thisiplong >= 3401383936 && $thisiplong <= 3401400319){return true;}
	if($thisiplong >= 3401404416 && $thisiplong <= 3401408511){return true;}
	if($thisiplong >= 3401431040 && $thisiplong <= 3401433087){return true;}
	if($thisiplong >= 3401515008 && $thisiplong <= 3401515263){return true;}
	if($thisiplong >= 3401532416 && $thisiplong <= 3401533439){return true;}
	if($thisiplong >= 3401533440 && $thisiplong <= 3401535487){return true;}
	if($thisiplong >= 3401535488 && $thisiplong <= 3401539583){return true;}
	if($thisiplong >= 3401580544 && $thisiplong <= 3402104831){return true;}
	if($thisiplong >= 3402104832 && $thisiplong <= 3402366975){return true;}
	if($thisiplong >= 3402366976 && $thisiplong <= 3402629119){return true;}
	if($thisiplong >= 3405775872 && $thisiplong <= 3405776895){return true;}
	if($thisiplong >= 3405777408 && $thisiplong <= 3405777919){return true;}
	if($thisiplong >= 3405779456 && $thisiplong <= 3405779711){return true;}
	if($thisiplong >= 3405780992 && $thisiplong <= 3405781247){return true;}
	if($thisiplong >= 3405785600 && $thisiplong <= 3405786111){return true;}
	if($thisiplong >= 3405786368 && $thisiplong <= 3405786623){return true;}
	if($thisiplong >= 3405786624 && $thisiplong <= 3405787135){return true;}
	if($thisiplong >= 3405795584 && $thisiplong <= 3405795839){return true;}
	if($thisiplong >= 3405795840 && $thisiplong <= 3405796351){return true;}
	if($thisiplong >= 3405797888 && $thisiplong <= 3405798399){return true;}
	if($thisiplong >= 3405799424 && $thisiplong <= 3405799935){return true;}
	if($thisiplong >= 3405801472 && $thisiplong <= 3405803519){return true;}
	if($thisiplong >= 3405804032 && $thisiplong <= 3405804543){return true;}
	if($thisiplong >= 3405806080 && $thisiplong <= 3405806335){return true;}
	if($thisiplong >= 3405807616 && $thisiplong <= 3405807871){return true;}
	if($thisiplong >= 3405808128 && $thisiplong <= 3405808639){return true;}
	if($thisiplong >= 3405808640 && $thisiplong <= 3405809663){return true;}
	if($thisiplong >= 3405809920 && $thisiplong <= 3405810175){return true;}
	if($thisiplong >= 3405811200 && $thisiplong <= 3405811455){return true;}
	if($thisiplong >= 3405811712 && $thisiplong <= 3405811967){return true;}
	if($thisiplong >= 3405812224 && $thisiplong <= 3405812479){return true;}
	if($thisiplong >= 3405812736 && $thisiplong <= 3405812991){return true;}
	if($thisiplong >= 3405813248 && $thisiplong <= 3405813759){return true;}
	if($thisiplong >= 3405813760 && $thisiplong <= 3405814015){return true;}
	if($thisiplong >= 3405820160 && $thisiplong <= 3405820415){return true;}
	if($thisiplong >= 3405832192 && $thisiplong <= 3405832447){return true;}
	if($thisiplong >= 3405841408 && $thisiplong <= 3405842431){return true;}
	if($thisiplong >= 3405844992 && $thisiplong <= 3405845247){return true;}
	if($thisiplong >= 3405847040 && $thisiplong <= 3405847551){return true;}
	if($thisiplong >= 3405857024 && $thisiplong <= 3405857279){return true;}
	if($thisiplong >= 3405857280 && $thisiplong <= 3405857791){return true;}
	if($thisiplong >= 3405858304 && $thisiplong <= 3405858815){return true;}
	if($thisiplong >= 3405859840 && $thisiplong <= 3405860351){return true;}
	if($thisiplong >= 3405863424 && $thisiplong <= 3405863679){return true;}
	if($thisiplong >= 3405865216 && $thisiplong <= 3405865471){return true;}
	if($thisiplong >= 3405865472 && $thisiplong <= 3405865983){return true;}
	if($thisiplong >= 3405865984 && $thisiplong <= 3405867007){return true;}
	if($thisiplong >= 3405868032 && $thisiplong <= 3405868287){return true;}
	if($thisiplong >= 3405905152 && $thisiplong <= 3405905407){return true;}
	if($thisiplong >= 3405905408 && $thisiplong <= 3405905663){return true;}
	if($thisiplong >= 3405922304 && $thisiplong <= 3405924351){return true;}
	if($thisiplong >= 3405924608 && $thisiplong <= 3405924863){return true;}
	if($thisiplong >= 3405934592 && $thisiplong <= 3405936639){return true;}
	if($thisiplong >= 3405938176 && $thisiplong <= 3405938687){return true;}
	if($thisiplong >= 3405941760 && $thisiplong <= 3405942015){return true;}
	if($thisiplong >= 3405944320 && $thisiplong <= 3405944575){return true;}
	if($thisiplong >= 3405944832 && $thisiplong <= 3405945855){return true;}
	if($thisiplong >= 3405945856 && $thisiplong <= 3405946367){return true;}
	if($thisiplong >= 3405946880 && $thisiplong <= 3405948927){return true;}
	if($thisiplong >= 3405952000 && $thisiplong <= 3405952511){return true;}
	if($thisiplong >= 3405956096 && $thisiplong <= 3405956607){return true;}
	if($thisiplong >= 3405959424 && $thisiplong <= 3405959679){return true;}
	if($thisiplong >= 3405960704 && $thisiplong <= 3405961215){return true;}
	if($thisiplong >= 3405963776 && $thisiplong <= 3405964287){return true;}
	if($thisiplong >= 3405964544 && $thisiplong <= 3405964799){return true;}
	if($thisiplong >= 3405966336 && $thisiplong <= 3405966847){return true;}
	if($thisiplong >= 3405988864 && $thisiplong <= 3405989119){return true;}
	if($thisiplong >= 3405989888 && $thisiplong <= 3405990399){return true;}
	if($thisiplong >= 3405990656 && $thisiplong <= 3405990911){return true;}
	if($thisiplong >= 3405991936 && $thisiplong <= 3405993983){return true;}
	if($thisiplong >= 3405996032 && $thisiplong <= 3405997055){return true;}
	if($thisiplong >= 3405998336 && $thisiplong <= 3405998591){return true;}
	if($thisiplong >= 3406000128 && $thisiplong <= 3406002175){return true;}
	if($thisiplong >= 3406002176 && $thisiplong <= 3406002431){return true;}
	if($thisiplong >= 3406002944 && $thisiplong <= 3406003199){return true;}
	if($thisiplong >= 3406006016 && $thisiplong <= 3406006271){return true;}
	if($thisiplong >= 3406007040 && $thisiplong <= 3406007295){return true;}
	if($thisiplong >= 3406008064 && $thisiplong <= 3406008319){return true;}
	if($thisiplong >= 3406070784 && $thisiplong <= 3406071295){return true;}
	if($thisiplong >= 3406071296 && $thisiplong <= 3406071551){return true;}
	if($thisiplong >= 3406075648 && $thisiplong <= 3406075903){return true;}
	if($thisiplong >= 3406075904 && $thisiplong <= 3406076927){return true;}
	if($thisiplong >= 3406081536 && $thisiplong <= 3406082047){return true;}
	if($thisiplong >= 3406083072 && $thisiplong <= 3406083327){return true;}
	if($thisiplong >= 3406084608 && $thisiplong <= 3406084863){return true;}
	if($thisiplong >= 3406089472 && $thisiplong <= 3406089727){return true;}
	if($thisiplong >= 3406090240 && $thisiplong <= 3406091263){return true;}
	if($thisiplong >= 3406095104 && $thisiplong <= 3406095359){return true;}
	if($thisiplong >= 3406095872 && $thisiplong <= 3406096383){return true;}
	if($thisiplong >= 3406103552 && $thisiplong <= 3406104063){return true;}
	if($thisiplong >= 3406104320 && $thisiplong <= 3406104575){return true;}
	if($thisiplong >= 3406104576 && $thisiplong <= 3406105087){return true;}
	if($thisiplong >= 3406105344 && $thisiplong <= 3406105599){return true;}
	if($thisiplong >= 3406107904 && $thisiplong <= 3406108159){return true;}
	if($thisiplong >= 3406108160 && $thisiplong <= 3406108415){return true;}
	if($thisiplong >= 3406113792 && $thisiplong <= 3406114047){return true;}
	if($thisiplong >= 3406114304 && $thisiplong <= 3406114815){return true;}
	if($thisiplong >= 3406115840 && $thisiplong <= 3406116863){return true;}
	if($thisiplong >= 3406116864 && $thisiplong <= 3406117375){return true;}
	if($thisiplong >= 3406117888 && $thisiplong <= 3406118399){return true;}
	if($thisiplong >= 3406131712 && $thisiplong <= 3406132223){return true;}
	if($thisiplong >= 3406132736 && $thisiplong <= 3406132991){return true;}
	if($thisiplong >= 3406133248 && $thisiplong <= 3406133503){return true;}
	if($thisiplong >= 3406146560 && $thisiplong <= 3406146815){return true;}
	if($thisiplong >= 3406148608 && $thisiplong <= 3406149119){return true;}
	if($thisiplong >= 3406149120 && $thisiplong <= 3406149375){return true;}
	if($thisiplong >= 3406149888 && $thisiplong <= 3406150143){return true;}
	if($thisiplong >= 3406150144 && $thisiplong <= 3406150399){return true;}
	if($thisiplong >= 3406150656 && $thisiplong <= 3406151167){return true;}
	if($thisiplong >= 3406151168 && $thisiplong <= 3406151423){return true;}
	if($thisiplong >= 3406152448 && $thisiplong <= 3406152703){return true;}
	if($thisiplong >= 3406157312 && $thisiplong <= 3406157823){return true;}
	if($thisiplong >= 3406158336 && $thisiplong <= 3406158847){return true;}
	if($thisiplong >= 3406201600 && $thisiplong <= 3406201855){return true;}
	if($thisiplong >= 3406202880 && $thisiplong <= 3406203135){return true;}
	if($thisiplong >= 3406203392 && $thisiplong <= 3406203903){return true;}
	if($thisiplong >= 3406204416 && $thisiplong <= 3406204671){return true;}
	if($thisiplong >= 3406206464 && $thisiplong <= 3406206975){return true;}
	if($thisiplong >= 3406208256 && $thisiplong <= 3406208511){return true;}
	if($thisiplong >= 3406208768 && $thisiplong <= 3406209023){return true;}
	if($thisiplong >= 3406225408 && $thisiplong <= 3406229503){return true;}
	if($thisiplong >= 3406231552 && $thisiplong <= 3406232063){return true;}
	if($thisiplong >= 3406266624 && $thisiplong <= 3406266879){return true;}
	if($thisiplong >= 3406268928 && $thisiplong <= 3406269439){return true;}
	if($thisiplong >= 3406271232 && $thisiplong <= 3406271487){return true;}
	if($thisiplong >= 3406272000 && $thisiplong <= 3406272511){return true;}
	if($thisiplong >= 3406274048 && $thisiplong <= 3406274303){return true;}
	if($thisiplong >= 3406282752 && $thisiplong <= 3406283263){return true;}
	if($thisiplong >= 3406284800 && $thisiplong <= 3406285055){return true;}
	if($thisiplong >= 3406299136 && $thisiplong <= 3406299391){return true;}
	if($thisiplong >= 3406301184 && $thisiplong <= 3406301439){return true;}
	if($thisiplong >= 3406305024 && $thisiplong <= 3406305279){return true;}
	if($thisiplong >= 3406305280 && $thisiplong <= 3406307327){return true;}
	if($thisiplong >= 3406317056 && $thisiplong <= 3406317311){return true;}
	if($thisiplong >= 3406320128 && $thisiplong <= 3406320383){return true;}
	if($thisiplong >= 3406321152 && $thisiplong <= 3406321663){return true;}
	if($thisiplong >= 3406322432 && $thisiplong <= 3406322687){return true;}
	if($thisiplong >= 3406327296 && $thisiplong <= 3406327807){return true;}
	if($thisiplong >= 3406328576 && $thisiplong <= 3406328831){return true;}
	if($thisiplong >= 3406341632 && $thisiplong <= 3406342143){return true;}
	if($thisiplong >= 3406342400 && $thisiplong <= 3406342655){return true;}
	if($thisiplong >= 3406343424 && $thisiplong <= 3406343679){return true;}
	if($thisiplong >= 3406346240 && $thisiplong <= 3406346495){return true;}
	if($thisiplong >= 3406346752 && $thisiplong <= 3406347263){return true;}
	if($thisiplong >= 3406347776 && $thisiplong <= 3406348287){return true;}
	if($thisiplong >= 3406348288 && $thisiplong <= 3406348543){return true;}
	if($thisiplong >= 3406349568 && $thisiplong <= 3406349823){return true;}
	if($thisiplong >= 3406349824 && $thisiplong <= 3406350335){return true;}
	if($thisiplong >= 3406351104 && $thisiplong <= 3406351359){return true;}
	if($thisiplong >= 3406352640 && $thisiplong <= 3406352895){return true;}
	if($thisiplong >= 3406352896 && $thisiplong <= 3406353407){return true;}
	if($thisiplong >= 3406353408 && $thisiplong <= 3406354431){return true;}
	if($thisiplong >= 3406354688 && $thisiplong <= 3406354943){return true;}
	if($thisiplong >= 3406355456 && $thisiplong <= 3406355711){return true;}
	if($thisiplong >= 3406372864 && $thisiplong <= 3406373119){return true;}
	if($thisiplong >= 3406373888 && $thisiplong <= 3406374399){return true;}
	if($thisiplong >= 3406379264 && $thisiplong <= 3406379519){return true;}
	if($thisiplong >= 3406380800 && $thisiplong <= 3406381055){return true;}
	if($thisiplong >= 3406381312 && $thisiplong <= 3406381567){return true;}
	if($thisiplong >= 3406382592 && $thisiplong <= 3406383103){return true;}
	if($thisiplong >= 3406383104 && $thisiplong <= 3406383359){return true;}
	if($thisiplong >= 3406383872 && $thisiplong <= 3406384127){return true;}
	if($thisiplong >= 3406384128 && $thisiplong <= 3406384639){return true;}
	if($thisiplong >= 3406389248 && $thisiplong <= 3406390271){return true;}
	if($thisiplong >= 3406390272 && $thisiplong <= 3406390783){return true;}
	if($thisiplong >= 3406392320 && $thisiplong <= 3406392575){return true;}
	if($thisiplong >= 3406405120 && $thisiplong <= 3406405375){return true;}
	if($thisiplong >= 3406438912 && $thisiplong <= 3406439167){return true;}
	if($thisiplong >= 3406444544 && $thisiplong <= 3406444799){return true;}
	if($thisiplong >= 3406449152 && $thisiplong <= 3406449663){return true;}
	if($thisiplong >= 3406451712 && $thisiplong <= 3406452735){return true;}
	if($thisiplong >= 3406452736 && $thisiplong <= 3406452991){return true;}
	if($thisiplong >= 3406454528 && $thisiplong <= 3406454783){return true;}
	if($thisiplong >= 3406462208 && $thisiplong <= 3406462463){return true;}
	if($thisiplong >= 3406513664 && $thisiplong <= 3406513919){return true;}
	if($thisiplong >= 3406515200 && $thisiplong <= 3406516223){return true;}
	if($thisiplong >= 3406516736 && $thisiplong <= 3406516991){return true;}
	if($thisiplong >= 3406517248 && $thisiplong <= 3406518271){return true;}
	if($thisiplong >= 3406521344 && $thisiplong <= 3406522367){return true;}
	if($thisiplong >= 3406523648 && $thisiplong <= 3406523903){return true;}
	if($thisiplong >= 3406525696 && $thisiplong <= 3406525951){return true;}
	if($thisiplong >= 3406526976 && $thisiplong <= 3406527231){return true;}
	if($thisiplong >= 3406528000 && $thisiplong <= 3406528255){return true;}
	if($thisiplong >= 3406530560 && $thisiplong <= 3406531583){return true;}
	if($thisiplong >= 3406531840 && $thisiplong <= 3406532095){return true;}
	if($thisiplong >= 3406532096 && $thisiplong <= 3406532607){return true;}
	if($thisiplong >= 3406541824 && $thisiplong <= 3406542847){return true;}
	if($thisiplong >= 3406548992 && $thisiplong <= 3406550015){return true;}
	if($thisiplong >= 3406565376 && $thisiplong <= 3406565631){return true;}
	if($thisiplong >= 3406566144 && $thisiplong <= 3406566399){return true;}
	if($thisiplong >= 3406567424 && $thisiplong <= 3406567679){return true;}
	if($thisiplong >= 3406575872 && $thisiplong <= 3406576127){return true;}
	if($thisiplong >= 3406577920 && $thisiplong <= 3406578175){return true;}
	if($thisiplong >= 3406578176 && $thisiplong <= 3406578431){return true;}
	if($thisiplong >= 3406579200 && $thisiplong <= 3406579711){return true;}
	if($thisiplong >= 3406583552 && $thisiplong <= 3406583807){return true;}
	if($thisiplong >= 3406583808 && $thisiplong <= 3406585855){return true;}
	if($thisiplong >= 3406586880 && $thisiplong <= 3406587391){return true;}
	if($thisiplong >= 3406587648 && $thisiplong <= 3406587903){return true;}
	if($thisiplong >= 3406590464 && $thisiplong <= 3406590719){return true;}
	if($thisiplong >= 3406591488 && $thisiplong <= 3406591743){return true;}
	if($thisiplong >= 3406594560 && $thisiplong <= 3406594815){return true;}
	if($thisiplong >= 3406596352 && $thisiplong <= 3406596607){return true;}
	if($thisiplong >= 3406611456 && $thisiplong <= 3406612479){return true;}
	if($thisiplong >= 3406612480 && $thisiplong <= 3406614527){return true;}
	if($thisiplong >= 3406615296 && $thisiplong <= 3406615551){return true;}
	if($thisiplong >= 3406617344 && $thisiplong <= 3406617599){return true;}
	if($thisiplong >= 3406619136 && $thisiplong <= 3406619391){return true;}
	if($thisiplong >= 3406622720 && $thisiplong <= 3406623743){return true;}
	if($thisiplong >= 3406631424 && $thisiplong <= 3406631679){return true;}
	if($thisiplong >= 3406632960 && $thisiplong <= 3406633215){return true;}
	if($thisiplong >= 3406638080 && $thisiplong <= 3406638591){return true;}
	if($thisiplong >= 3406647296 && $thisiplong <= 3406649343){return true;}
	if($thisiplong >= 3406649344 && $thisiplong <= 3406649855){return true;}
	if($thisiplong >= 3406650368 && $thisiplong <= 3406651391){return true;}
	if($thisiplong >= 3406671104 && $thisiplong <= 3406671359){return true;}
	if($thisiplong >= 3406684160 && $thisiplong <= 3406684671){return true;}
	if($thisiplong >= 3406684928 && $thisiplong <= 3406685183){return true;}
	if($thisiplong >= 3406686464 && $thisiplong <= 3406686719){return true;}
	if($thisiplong >= 3406698496 && $thisiplong <= 3406699519){return true;}
	if($thisiplong >= 3406700800 && $thisiplong <= 3406701055){return true;}
	if($thisiplong >= 3406706688 && $thisiplong <= 3406706943){return true;}
	if($thisiplong >= 3406707968 && $thisiplong <= 3406708223){return true;}
	if($thisiplong >= 3406708224 && $thisiplong <= 3406708479){return true;}
	if($thisiplong >= 3406718976 && $thisiplong <= 3406719231){return true;}
	if($thisiplong >= 3406721536 && $thisiplong <= 3406722047){return true;}
	if($thisiplong >= 3406722560 && $thisiplong <= 3406722815){return true;}
	if($thisiplong >= 3406733824 && $thisiplong <= 3406734079){return true;}
	if($thisiplong >= 3406739456 && $thisiplong <= 3406741503){return true;}
	if($thisiplong >= 3406741504 && $thisiplong <= 3406741759){return true;}
	if($thisiplong >= 3406742016 && $thisiplong <= 3406742527){return true;}
	if($thisiplong >= 3406747136 && $thisiplong <= 3406747391){return true;}
	if($thisiplong >= 3406751488 && $thisiplong <= 3406751743){return true;}
	if($thisiplong >= 3406755328 && $thisiplong <= 3406755583){return true;}
	if($thisiplong >= 3406757888 && $thisiplong <= 3406761983){return true;}
	if($thisiplong >= 3406763008 && $thisiplong <= 3406763519){return true;}
	if($thisiplong >= 3406763520 && $thisiplong <= 3406763775){return true;}
	if($thisiplong >= 3406780160 && $thisiplong <= 3406780415){return true;}
	if($thisiplong >= 3406780416 && $thisiplong <= 3406780927){return true;}
	if($thisiplong >= 3406784768 && $thisiplong <= 3406785023){return true;}
	if($thisiplong >= 3406786560 && $thisiplong <= 3406788607){return true;}
	if($thisiplong >= 3406791168 && $thisiplong <= 3406791679){return true;}
	if($thisiplong >= 3406796032 && $thisiplong <= 3406796287){return true;}
	if($thisiplong >= 3406796544 && $thisiplong <= 3406796799){return true;}
	if($thisiplong >= 3406797824 && $thisiplong <= 3406798847){return true;}
	if($thisiplong >= 3406802432 && $thisiplong <= 3406802687){return true;}
	if($thisiplong >= 3406816000 && $thisiplong <= 3406816255){return true;}
	if($thisiplong >= 3406817280 && $thisiplong <= 3406819327){return true;}
	if($thisiplong >= 3406819328 && $thisiplong <= 3406819839){return true;}
	if($thisiplong >= 3406820864 && $thisiplong <= 3406821119){return true;}
	if($thisiplong >= 3406825984 && $thisiplong <= 3406826239){return true;}
	if($thisiplong >= 3406826496 && $thisiplong <= 3406827007){return true;}
	if($thisiplong >= 3406827520 && $thisiplong <= 3406829567){return true;}
	if($thisiplong >= 3406830336 && $thisiplong <= 3406830591){return true;}
	if($thisiplong >= 3406833152 && $thisiplong <= 3406833407){return true;}
	if($thisiplong >= 3406835968 && $thisiplong <= 3406836223){return true;}
	if($thisiplong >= 3406836224 && $thisiplong <= 3406836735){return true;}
	if($thisiplong >= 3406838272 && $thisiplong <= 3406838527){return true;}
	if($thisiplong >= 3406839552 && $thisiplong <= 3406839807){return true;}
	if($thisiplong >= 3406857472 && $thisiplong <= 3406857727){return true;}
	if($thisiplong >= 3406864640 && $thisiplong <= 3406864895){return true;}
	if($thisiplong >= 3406864896 && $thisiplong <= 3406865151){return true;}
	if($thisiplong >= 3406871040 && $thisiplong <= 3406871551){return true;}
	if($thisiplong >= 3406881792 && $thisiplong <= 3406882047){return true;}
	if($thisiplong >= 3406884352 && $thisiplong <= 3406884607){return true;}
	if($thisiplong >= 3406884864 && $thisiplong <= 3406885119){return true;}
	if($thisiplong >= 3406886144 && $thisiplong <= 3406886399){return true;}
	if($thisiplong >= 3406889472 && $thisiplong <= 3406889727){return true;}
	if($thisiplong >= 3406893568 && $thisiplong <= 3406893823){return true;}
	if($thisiplong >= 3406896128 && $thisiplong <= 3406896383){return true;}
	if($thisiplong >= 3406898944 && $thisiplong <= 3406899199){return true;}
	if($thisiplong >= 3406903296 && $thisiplong <= 3406903551){return true;}
	if($thisiplong >= 3406907904 && $thisiplong <= 3406908415){return true;}
	if($thisiplong >= 3406911488 && $thisiplong <= 3406911999){return true;}
	if($thisiplong >= 3406923776 && $thisiplong <= 3406924031){return true;}
	if($thisiplong >= 3406930944 && $thisiplong <= 3406931199){return true;}
	if($thisiplong >= 3406936832 && $thisiplong <= 3406937087){return true;}
	if($thisiplong >= 3406937600 && $thisiplong <= 3406938111){return true;}
	if($thisiplong >= 3406948096 && $thisiplong <= 3406948351){return true;}
	if($thisiplong >= 3406948608 && $thisiplong <= 3406948863){return true;}
	if($thisiplong >= 3406952448 && $thisiplong <= 3406952703){return true;}
	if($thisiplong >= 3406954240 && $thisiplong <= 3406954495){return true;}
	if($thisiplong >= 3406955008 && $thisiplong <= 3406955519){return true;}
	if($thisiplong >= 3406955520 && $thisiplong <= 3406955775){return true;}
	if($thisiplong >= 3406956288 && $thisiplong <= 3406956543){return true;}
	if($thisiplong >= 3406962432 && $thisiplong <= 3406962687){return true;}
	if($thisiplong >= 3406963968 && $thisiplong <= 3406964223){return true;}
	if($thisiplong >= 3406966784 && $thisiplong <= 3406967295){return true;}
	if($thisiplong >= 3406967296 && $thisiplong <= 3406967551){return true;}
	if($thisiplong >= 3406967808 && $thisiplong <= 3406968063){return true;}
	if($thisiplong >= 3406972928 && $thisiplong <= 3406973951){return true;}
	if($thisiplong >= 3406974976 && $thisiplong <= 3406975487){return true;}
	if($thisiplong >= 3406976768 && $thisiplong <= 3406977023){return true;}
	if($thisiplong >= 3406980096 && $thisiplong <= 3406980607){return true;}
	if($thisiplong >= 3406981376 && $thisiplong <= 3406981631){return true;}
	if($thisiplong >= 3406981888 && $thisiplong <= 3406982143){return true;}
	if($thisiplong >= 3406982656 && $thisiplong <= 3406982911){return true;}
	if($thisiplong >= 3406987520 && $thisiplong <= 3406987775){return true;}
	if($thisiplong >= 3406988032 && $thisiplong <= 3406988287){return true;}
	if($thisiplong >= 3406988288 && $thisiplong <= 3406988799){return true;}
	if($thisiplong >= 3406991360 && $thisiplong <= 3406991615){return true;}
	if($thisiplong >= 3406993664 && $thisiplong <= 3406993919){return true;}
	if($thisiplong >= 3407005440 && $thisiplong <= 3407005695){return true;}
	if($thisiplong >= 3407007744 && $thisiplong <= 3407007999){return true;}
	if($thisiplong >= 3407008512 && $thisiplong <= 3407008767){return true;}
	if($thisiplong >= 3407009536 && $thisiplong <= 3407009791){return true;}
	if($thisiplong >= 3407024640 && $thisiplong <= 3407024895){return true;}
	if($thisiplong >= 3407026176 && $thisiplong <= 3407026431){return true;}
	if($thisiplong >= 3407027712 && $thisiplong <= 3407027967){return true;}
	if($thisiplong >= 3407028224 && $thisiplong <= 3407030271){return true;}
	if($thisiplong >= 3407030528 && $thisiplong <= 3407030783){return true;}
	if($thisiplong >= 3407031296 && $thisiplong <= 3407031807){return true;}
	if($thisiplong >= 3407031808 && $thisiplong <= 3407032063){return true;}
	if($thisiplong >= 3407034880 && $thisiplong <= 3407035135){return true;}
	if($thisiplong >= 3407035392 && $thisiplong <= 3407035903){return true;}
	if($thisiplong >= 3407036416 && $thisiplong <= 3407036671){return true;}
	if($thisiplong >= 3407037440 && $thisiplong <= 3407037695){return true;}
	if($thisiplong >= 3407038464 && $thisiplong <= 3407038719){return true;}
	if($thisiplong >= 3407045888 && $thisiplong <= 3407046143){return true;}
	if($thisiplong >= 3407048448 && $thisiplong <= 3407048703){return true;}
	if($thisiplong >= 3407053568 && $thisiplong <= 3407053823){return true;}
	if($thisiplong >= 3407054080 && $thisiplong <= 3407054335){return true;}
	if($thisiplong >= 3407056896 && $thisiplong <= 3407057151){return true;}
	if($thisiplong >= 3407058176 && $thisiplong <= 3407058431){return true;}
	if($thisiplong >= 3407059968 && $thisiplong <= 3407060223){return true;}
	if($thisiplong >= 3407065088 && $thisiplong <= 3407065343){return true;}
	if($thisiplong >= 3407065600 && $thisiplong <= 3407066111){return true;}
	if($thisiplong >= 3407073280 && $thisiplong <= 3407073535){return true;}
	if($thisiplong >= 3407078400 && $thisiplong <= 3407079423){return true;}
	if($thisiplong >= 3407079680 && $thisiplong <= 3407079935){return true;}
	if($thisiplong >= 3407081984 && $thisiplong <= 3407082239){return true;}
	if($thisiplong >= 3407083520 && $thisiplong <= 3407084031){return true;}
	if($thisiplong >= 3407085312 && $thisiplong <= 3407085567){return true;}
	if($thisiplong >= 3407089920 && $thisiplong <= 3407090175){return true;}
	if($thisiplong >= 3407095808 && $thisiplong <= 3407096319){return true;}
	if($thisiplong >= 3407097856 && $thisiplong <= 3407098111){return true;}
	if($thisiplong >= 3407101184 && $thisiplong <= 3407101439){return true;}
	if($thisiplong >= 3407101696 && $thisiplong <= 3407101951){return true;}
	if($thisiplong >= 3407102208 && $thisiplong <= 3407102463){return true;}
	if($thisiplong >= 3407107072 && $thisiplong <= 3407107583){return true;}
	if($thisiplong >= 3407108352 && $thisiplong <= 3407108607){return true;}
	if($thisiplong >= 3407112704 && $thisiplong <= 3407113215){return true;}
	if($thisiplong >= 3407115008 && $thisiplong <= 3407115263){return true;}
	if($thisiplong >= 3407115520 && $thisiplong <= 3407115775){return true;}
	if($thisiplong >= 3407115776 && $thisiplong <= 3407116287){return true;}
	if($thisiplong >= 3407116800 && $thisiplong <= 3407117055){return true;}
	if($thisiplong >= 3407117824 && $thisiplong <= 3407118335){return true;}
	if($thisiplong >= 3407120128 && $thisiplong <= 3407120383){return true;}
	if($thisiplong >= 3407120384 && $thisiplong <= 3407122431){return true;}
	if($thisiplong >= 3407123968 && $thisiplong <= 3407124223){return true;}
	if($thisiplong >= 3407144448 && $thisiplong <= 3407144703){return true;}
	if($thisiplong >= 3407144960 && $thisiplong <= 3407145215){return true;}
	if($thisiplong >= 3407145984 && $thisiplong <= 3407146239){return true;}
	if($thisiplong >= 3407151104 && $thisiplong <= 3407151615){return true;}
	if($thisiplong >= 3407151616 && $thisiplong <= 3407151871){return true;}
	if($thisiplong >= 3407153152 && $thisiplong <= 3407153407){return true;}
	if($thisiplong >= 3407153664 && $thisiplong <= 3407153919){return true;}
	if($thisiplong >= 3407155712 && $thisiplong <= 3407155967){return true;}
	if($thisiplong >= 3407159552 && $thisiplong <= 3407159807){return true;}
	if($thisiplong >= 3407159808 && $thisiplong <= 3407160063){return true;}
	if($thisiplong >= 3407161600 && $thisiplong <= 3407161855){return true;}
	if($thisiplong >= 3407162368 && $thisiplong <= 3407162623){return true;}
	if($thisiplong >= 3407168512 && $thisiplong <= 3407168767){return true;}
	if($thisiplong >= 3407172096 && $thisiplong <= 3407172351){return true;}
	if($thisiplong >= 3407175680 && $thisiplong <= 3407176703){return true;}
	if($thisiplong >= 3407182848 && $thisiplong <= 3407183103){return true;}
	if($thisiplong >= 3407185920 && $thisiplong <= 3407186431){return true;}
	if($thisiplong >= 3407188224 && $thisiplong <= 3407188479){return true;}
	if($thisiplong >= 3407203840 && $thisiplong <= 3407204095){return true;}
	if($thisiplong >= 3407222784 && $thisiplong <= 3407223039){return true;}
	if($thisiplong >= 3407223808 && $thisiplong <= 3407224319){return true;}
	if($thisiplong >= 3407224576 && $thisiplong <= 3407224831){return true;}
	if($thisiplong >= 3407234048 && $thisiplong <= 3407234303){return true;}
	if($thisiplong >= 3407236096 && $thisiplong <= 3407236351){return true;}
	if($thisiplong >= 3407236608 && $thisiplong <= 3407236863){return true;}
	if($thisiplong >= 3407238144 && $thisiplong <= 3407238399){return true;}
	if($thisiplong >= 3407238912 && $thisiplong <= 3407239167){return true;}
	if($thisiplong >= 3407240192 && $thisiplong <= 3407241215){return true;}
	if($thisiplong >= 3407241984 && $thisiplong <= 3407242239){return true;}
	if($thisiplong >= 3407243776 && $thisiplong <= 3407244031){return true;}
	if($thisiplong >= 3407247872 && $thisiplong <= 3407248383){return true;}
	if($thisiplong >= 3407250176 && $thisiplong <= 3407250431){return true;}
	if($thisiplong >= 3407258368 && $thisiplong <= 3407258623){return true;}
	if($thisiplong >= 3407259136 && $thisiplong <= 3407259391){return true;}
	if($thisiplong >= 3407260160 && $thisiplong <= 3407260415){return true;}
	if($thisiplong >= 3407261696 && $thisiplong <= 3407263743){return true;}
	if($thisiplong >= 3407266304 && $thisiplong <= 3407266559){return true;}
	if($thisiplong >= 3407278592 && $thisiplong <= 3407279103){return true;}
	if($thisiplong >= 3407279360 && $thisiplong <= 3407279615){return true;}
	if($thisiplong >= 3407279616 && $thisiplong <= 3407279871){return true;}
	if($thisiplong >= 3407281152 && $thisiplong <= 3407281663){return true;}
	if($thisiplong >= 3407282176 && $thisiplong <= 3407282431){return true;}
	if($thisiplong >= 3407294208 && $thisiplong <= 3407294463){return true;}
	if($thisiplong >= 3407297792 && $thisiplong <= 3407298047){return true;}
	if($thisiplong >= 3407298048 && $thisiplong <= 3407298559){return true;}
	if($thisiplong >= 3407300864 && $thisiplong <= 3407301119){return true;}
	if($thisiplong >= 3407303936 && $thisiplong <= 3407304191){return true;}
	if($thisiplong >= 3407305728 && $thisiplong <= 3407306751){return true;}
	if($thisiplong >= 3407307264 && $thisiplong <= 3407307519){return true;}
	if($thisiplong >= 3407309568 && $thisiplong <= 3407309823){return true;}
	if($thisiplong >= 3407310848 && $thisiplong <= 3407311103){return true;}
	if($thisiplong >= 3407315456 && $thisiplong <= 3407315711){return true;}
	if($thisiplong >= 3407318016 && $thisiplong <= 3407318527){return true;}
	if($thisiplong >= 3407326208 && $thisiplong <= 3407326463){return true;}
	if($thisiplong >= 3407328768 && $thisiplong <= 3407329023){return true;}
	if($thisiplong >= 3407330048 && $thisiplong <= 3407330303){return true;}
	if($thisiplong >= 3407331328 && $thisiplong <= 3407331583){return true;}
	if($thisiplong >= 3407332608 && $thisiplong <= 3407332863){return true;}
	if($thisiplong >= 3407332864 && $thisiplong <= 3407333119){return true;}
	if($thisiplong >= 3407334400 && $thisiplong <= 3407335423){return true;}
	if($thisiplong >= 3407339520 && $thisiplong <= 3407339775){return true;}
	if($thisiplong >= 3407340032 && $thisiplong <= 3407340543){return true;}
	if($thisiplong >= 3407340544 && $thisiplong <= 3407341567){return true;}
	if($thisiplong >= 3407345920 && $thisiplong <= 3407346175){return true;}
	if($thisiplong >= 3407346432 && $thisiplong <= 3407346687){return true;}
	if($thisiplong >= 3407351040 && $thisiplong <= 3407351295){return true;}
	if($thisiplong >= 3407352320 && $thisiplong <= 3407352575){return true;}
	if($thisiplong >= 3407354624 && $thisiplong <= 3407354879){return true;}
	if($thisiplong >= 3407358720 && $thisiplong <= 3407358975){return true;}
	if($thisiplong >= 3407362048 && $thisiplong <= 3407362303){return true;}
	if($thisiplong >= 3407362560 && $thisiplong <= 3407362815){return true;}
	if($thisiplong >= 3407364864 && $thisiplong <= 3407365119){return true;}
	if($thisiplong >= 3407366656 && $thisiplong <= 3407366911){return true;}
	if($thisiplong >= 3407367936 && $thisiplong <= 3407368191){return true;}
	if($thisiplong >= 3407368192 && $thisiplong <= 3407368703){return true;}
	if($thisiplong >= 3407369216 && $thisiplong <= 3407369727){return true;}
	if($thisiplong >= 3407369728 && $thisiplong <= 3407369983){return true;}
	if($thisiplong >= 3407370752 && $thisiplong <= 3407371007){return true;}
	if($thisiplong >= 3407376128 && $thisiplong <= 3407376383){return true;}
	if($thisiplong >= 3407376384 && $thisiplong <= 3407376639){return true;}
	if($thisiplong >= 3407377408 && $thisiplong <= 3407377663){return true;}
	if($thisiplong >= 3407378944 && $thisiplong <= 3407379455){return true;}
	if($thisiplong >= 3407384832 && $thisiplong <= 3407385087){return true;}
	if($thisiplong >= 3407386624 && $thisiplong <= 3407387135){return true;}
	if($thisiplong >= 3407387904 && $thisiplong <= 3407388159){return true;}
	if($thisiplong >= 3407388928 && $thisiplong <= 3407389183){return true;}
	if($thisiplong >= 3407390464 && $thisiplong <= 3407390719){return true;}
	if($thisiplong >= 3407395328 && $thisiplong <= 3407395839){return true;}
	if($thisiplong >= 3407398656 && $thisiplong <= 3407398911){return true;}
	if($thisiplong >= 3407399424 && $thisiplong <= 3407399679){return true;}
	if($thisiplong >= 3407401984 && $thisiplong <= 3407402495){return true;}
	if($thisiplong >= 3407403264 && $thisiplong <= 3407403519){return true;}
	if($thisiplong >= 3407403776 && $thisiplong <= 3407404031){return true;}
	if($thisiplong >= 3407410176 && $thisiplong <= 3407410431){return true;}
	if($thisiplong >= 3407418112 && $thisiplong <= 3407418367){return true;}
	if($thisiplong >= 3407418368 && $thisiplong <= 3407418879){return true;}
	if($thisiplong >= 3407425024 && $thisiplong <= 3407425279){return true;}
	if($thisiplong >= 3407425536 && $thisiplong <= 3407427583){return true;}
	if($thisiplong >= 3407429632 && $thisiplong <= 3407430143){return true;}
	if($thisiplong >= 3407436544 && $thisiplong <= 3407436799){return true;}
	if($thisiplong >= 3407438592 && $thisiplong <= 3407438847){return true;}
	if($thisiplong >= 3407438848 && $thisiplong <= 3407439103){return true;}
	if($thisiplong >= 3407440384 && $thisiplong <= 3407440639){return true;}
	if($thisiplong >= 3407446784 && $thisiplong <= 3407447039){return true;}
	if($thisiplong >= 3407447808 && $thisiplong <= 3407448063){return true;}
	if($thisiplong >= 3407448576 && $thisiplong <= 3407448831){return true;}
	if($thisiplong >= 3407450880 && $thisiplong <= 3407451135){return true;}
	if($thisiplong >= 3407452416 && $thisiplong <= 3407452671){return true;}
	if($thisiplong >= 3407452672 && $thisiplong <= 3407453183){return true;}
	if($thisiplong >= 3407455232 && $thisiplong <= 3407455487){return true;}
	if($thisiplong >= 3407455744 && $thisiplong <= 3407455999){return true;}
	if($thisiplong >= 3407457792 && $thisiplong <= 3407458303){return true;}
	if($thisiplong >= 3407459328 && $thisiplong <= 3407459583){return true;}
	if($thisiplong >= 3407459840 && $thisiplong <= 3407460095){return true;}
	if($thisiplong >= 3407462144 && $thisiplong <= 3407462399){return true;}
	if($thisiplong >= 3407464192 && $thisiplong <= 3407464447){return true;}
	if($thisiplong >= 3407464448 && $thisiplong <= 3407464703){return true;}
	if($thisiplong >= 3407464960 && $thisiplong <= 3407465471){return true;}
	if($thisiplong >= 3407466496 && $thisiplong <= 3407470591){return true;}
	if($thisiplong >= 3407471872 && $thisiplong <= 3407472127){return true;}
	if($thisiplong >= 3407473408 && $thisiplong <= 3407473663){return true;}
	if($thisiplong >= 3407473664 && $thisiplong <= 3407473919){return true;}
	if($thisiplong >= 3407475200 && $thisiplong <= 3407475455){return true;}
	if($thisiplong >= 3407481856 && $thisiplong <= 3407482111){return true;}
	if($thisiplong >= 3407487488 && $thisiplong <= 3407487743){return true;}
	if($thisiplong >= 3407491328 && $thisiplong <= 3407491583){return true;}
	if($thisiplong >= 3407491584 && $thisiplong <= 3407491839){return true;}
	if($thisiplong >= 3407492864 && $thisiplong <= 3407493119){return true;}
	if($thisiplong >= 3407493120 && $thisiplong <= 3407493631){return true;}
	if($thisiplong >= 3407494144 && $thisiplong <= 3407494399){return true;}
	if($thisiplong >= 3407495424 && $thisiplong <= 3407495679){return true;}
	if($thisiplong >= 3407496192 && $thisiplong <= 3407496447){return true;}
	if($thisiplong >= 3407498240 && $thisiplong <= 3407498495){return true;}
	if($thisiplong >= 3407499264 && $thisiplong <= 3407499519){return true;}
	if($thisiplong >= 3407500288 && $thisiplong <= 3407500543){return true;}
	if($thisiplong >= 3407503616 && $thisiplong <= 3407503871){return true;}
	if($thisiplong >= 3407504896 && $thisiplong <= 3407505407){return true;}
	if($thisiplong >= 3407508224 && $thisiplong <= 3407508479){return true;}
	if($thisiplong >= 3407508480 && $thisiplong <= 3407508735){return true;}
	if($thisiplong >= 3407511808 && $thisiplong <= 3407512063){return true;}
	if($thisiplong >= 3407515392 && $thisiplong <= 3407515647){return true;}
	if($thisiplong >= 3407515648 && $thisiplong <= 3407515903){return true;}
	if($thisiplong >= 3407516672 && $thisiplong <= 3407517183){return true;}
	if($thisiplong >= 3407518208 && $thisiplong <= 3407518463){return true;}
	if($thisiplong >= 3407519232 && $thisiplong <= 3407519743){return true;}
	if($thisiplong >= 3407522304 && $thisiplong <= 3407522559){return true;}
	if($thisiplong >= 3407523072 && $thisiplong <= 3407523327){return true;}
	if($thisiplong >= 3407523840 && $thisiplong <= 3407524095){return true;}
	if($thisiplong >= 3407526144 && $thisiplong <= 3407526399){return true;}
	if($thisiplong >= 3407530496 && $thisiplong <= 3407531007){return true;}
	if($thisiplong >= 3407532544 && $thisiplong <= 3407532799){return true;}
	if($thisiplong >= 3407533568 && $thisiplong <= 3407533823){return true;}
	if($thisiplong >= 3407535616 && $thisiplong <= 3407535871){return true;}
	if($thisiplong >= 3407536128 && $thisiplong <= 3407536383){return true;}
	if($thisiplong >= 3407537152 && $thisiplong <= 3407537407){return true;}
	if($thisiplong >= 3407538176 && $thisiplong <= 3407538431){return true;}
	if($thisiplong >= 3407544320 && $thisiplong <= 3407544575){return true;}
	if($thisiplong >= 3407546880 && $thisiplong <= 3407547135){return true;}
	if($thisiplong >= 3407548160 && $thisiplong <= 3407548415){return true;}
	if($thisiplong >= 3407548416 && $thisiplong <= 3407548671){return true;}
	if($thisiplong >= 3407549440 && $thisiplong <= 3407549695){return true;}
	if($thisiplong >= 3407549952 && $thisiplong <= 3407550463){return true;}
	if($thisiplong >= 3407554560 && $thisiplong <= 3407554815){return true;}
	if($thisiplong >= 3407555840 && $thisiplong <= 3407556095){return true;}
	if($thisiplong >= 3407557888 && $thisiplong <= 3407558143){return true;}
	if($thisiplong >= 3407560960 && $thisiplong <= 3407561215){return true;}
	if($thisiplong >= 3407561216 && $thisiplong <= 3407561471){return true;}
	if($thisiplong >= 3407565056 && $thisiplong <= 3407565311){return true;}
	if($thisiplong >= 3407566848 && $thisiplong <= 3407567103){return true;}
	if($thisiplong >= 3407570432 && $thisiplong <= 3407570687){return true;}
	if($thisiplong >= 3407572224 && $thisiplong <= 3407572479){return true;}
	if($thisiplong >= 3407574272 && $thisiplong <= 3407574527){return true;}
	if($thisiplong >= 3407575296 && $thisiplong <= 3407575551){return true;}
	if($thisiplong >= 3407575552 && $thisiplong <= 3407576063){return true;}
	if($thisiplong >= 3407576320 && $thisiplong <= 3407576575){return true;}
	if($thisiplong >= 3407595520 && $thisiplong <= 3407595775){return true;}
	if($thisiplong >= 3407596032 && $thisiplong <= 3407596287){return true;}
	if($thisiplong >= 3407603968 && $thisiplong <= 3407604223){return true;}
	if($thisiplong >= 3407606016 && $thisiplong <= 3407606271){return true;}
	if($thisiplong >= 3407608320 && $thisiplong <= 3407608575){return true;}
	if($thisiplong >= 3407612416 && $thisiplong <= 3407612671){return true;}
	if($thisiplong >= 3407612928 && $thisiplong <= 3407613183){return true;}
	if($thisiplong >= 3407618304 && $thisiplong <= 3407618559){return true;}
	if($thisiplong >= 3407618560 && $thisiplong <= 3407619071){return true;}
	if($thisiplong >= 3407620864 && $thisiplong <= 3407621119){return true;}
	if($thisiplong >= 3407621120 && $thisiplong <= 3407621375){return true;}
	if($thisiplong >= 3407623680 && $thisiplong <= 3407623935){return true;}
	if($thisiplong >= 3407624192 && $thisiplong <= 3407624447){return true;}
	if($thisiplong >= 3407628544 && $thisiplong <= 3407628799){return true;}
	if($thisiplong >= 3407628800 && $thisiplong <= 3407629055){return true;}
	if($thisiplong >= 3407629312 && $thisiplong <= 3407629567){return true;}
	if($thisiplong >= 3407631872 && $thisiplong <= 3407632127){return true;}
	if($thisiplong >= 3407632384 && $thisiplong <= 3407632639){return true;}
	if($thisiplong >= 3407638528 && $thisiplong <= 3407638783){return true;}
	if($thisiplong >= 3407643392 && $thisiplong <= 3407643647){return true;}
	if($thisiplong >= 3407644672 && $thisiplong <= 3407644927){return true;}
	if($thisiplong >= 3407645696 && $thisiplong <= 3407645951){return true;}
	if($thisiplong >= 3407646976 && $thisiplong <= 3407647231){return true;}
	if($thisiplong >= 3407652096 && $thisiplong <= 3407652351){return true;}
	if($thisiplong >= 3407653120 && $thisiplong <= 3407653375){return true;}
	if($thisiplong >= 3407653376 && $thisiplong <= 3407653631){return true;}
	if($thisiplong >= 3407655424 && $thisiplong <= 3407655935){return true;}
	if($thisiplong >= 3407657216 && $thisiplong <= 3407657471){return true;}
	if($thisiplong >= 3407657728 && $thisiplong <= 3407657983){return true;}
	if($thisiplong >= 3407660032 && $thisiplong <= 3407660287){return true;}
	if($thisiplong >= 3407667712 && $thisiplong <= 3407668223){return true;}
	if($thisiplong >= 3407671040 && $thisiplong <= 3407671295){return true;}
	if($thisiplong >= 3407675904 && $thisiplong <= 3407676159){return true;}
	if($thisiplong >= 3407677440 && $thisiplong <= 3407677951){return true;}
	if($thisiplong >= 3407678720 && $thisiplong <= 3407678975){return true;}
	if($thisiplong >= 3407678976 && $thisiplong <= 3407679231){return true;}
	if($thisiplong >= 3407682560 && $thisiplong <= 3407682815){return true;}
	if($thisiplong >= 3407687168 && $thisiplong <= 3407687423){return true;}
	if($thisiplong >= 3407689984 && $thisiplong <= 3407690239){return true;}
	if($thisiplong >= 3407691008 && $thisiplong <= 3407691263){return true;}
	if($thisiplong >= 3407691520 && $thisiplong <= 3407691775){return true;}
	if($thisiplong >= 3407693056 && $thisiplong <= 3407693311){return true;}
	if($thisiplong >= 3407694080 && $thisiplong <= 3407694335){return true;}
	if($thisiplong >= 3407696128 && $thisiplong <= 3407696383){return true;}
	if($thisiplong >= 3407698432 && $thisiplong <= 3407698687){return true;}
	if($thisiplong >= 3407699712 && $thisiplong <= 3407699967){return true;}
	if($thisiplong >= 3407700992 && $thisiplong <= 3407701247){return true;}
	if($thisiplong >= 3407701760 && $thisiplong <= 3407702015){return true;}
	if($thisiplong >= 3407704064 && $thisiplong <= 3407704319){return true;}
	if($thisiplong >= 3407706112 && $thisiplong <= 3407707135){return true;}
	if($thisiplong >= 3407721984 && $thisiplong <= 3407722495){return true;}
	if($thisiplong >= 3407723264 && $thisiplong <= 3407723519){return true;}
	if($thisiplong >= 3407723776 && $thisiplong <= 3407724031){return true;}
	if($thisiplong >= 3407724032 && $thisiplong <= 3407724287){return true;}
	if($thisiplong >= 3407727872 && $thisiplong <= 3407728127){return true;}
	if($thisiplong >= 3407729152 && $thisiplong <= 3407729407){return true;}
	if($thisiplong >= 3407730944 && $thisiplong <= 3407731199){return true;}
	if($thisiplong >= 3407733504 && $thisiplong <= 3407733759){return true;}
	if($thisiplong >= 3407734528 && $thisiplong <= 3407734783){return true;}
	if($thisiplong >= 3407735040 && $thisiplong <= 3407735295){return true;}
	if($thisiplong >= 3407735296 && $thisiplong <= 3407735551){return true;}
	if($thisiplong >= 3407738880 && $thisiplong <= 3407739135){return true;}
	if($thisiplong >= 3407740416 && $thisiplong <= 3407740927){return true;}
	if($thisiplong >= 3407745024 && $thisiplong <= 3407745535){return true;}
	if($thisiplong >= 3407747328 && $thisiplong <= 3407747583){return true;}
	if($thisiplong >= 3407747840 && $thisiplong <= 3407748095){return true;}
	if($thisiplong >= 3407748352 && $thisiplong <= 3407748607){return true;}
	if($thisiplong >= 3407757824 && $thisiplong <= 3407758079){return true;}
	if($thisiplong >= 3407761664 && $thisiplong <= 3407761919){return true;}
	if($thisiplong >= 3407763200 && $thisiplong <= 3407763455){return true;}
	if($thisiplong >= 3407769344 && $thisiplong <= 3407769599){return true;}
	if($thisiplong >= 3407771904 && $thisiplong <= 3407772159){return true;}
	if($thisiplong >= 3407772416 && $thisiplong <= 3407772671){return true;}
	if($thisiplong >= 3407779840 && $thisiplong <= 3407780095){return true;}
	if($thisiplong >= 3407780864 && $thisiplong <= 3407781119){return true;}
	if($thisiplong >= 3407782400 && $thisiplong <= 3407782655){return true;}
	if($thisiplong >= 3407785216 && $thisiplong <= 3407785471){return true;}
	if($thisiplong >= 3407785728 && $thisiplong <= 3407785983){return true;}
	if($thisiplong >= 3407788800 && $thisiplong <= 3407789055){return true;}
	if($thisiplong >= 3407790592 && $thisiplong <= 3407790847){return true;}
	if($thisiplong >= 3407796480 && $thisiplong <= 3407796735){return true;}
	if($thisiplong >= 3407797248 && $thisiplong <= 3407797503){return true;}
	if($thisiplong >= 3407797760 && $thisiplong <= 3407798015){return true;}
	if($thisiplong >= 3407800320 && $thisiplong <= 3407800831){return true;}
	if($thisiplong >= 3407801088 && $thisiplong <= 3407801343){return true;}
	if($thisiplong >= 3407802368 && $thisiplong <= 3407802879){return true;}
	if($thisiplong >= 3407803904 && $thisiplong <= 3407804159){return true;}
	if($thisiplong >= 3407804928 && $thisiplong <= 3407805439){return true;}
	if($thisiplong >= 3407817984 && $thisiplong <= 3407818239){return true;}
	if($thisiplong >= 3407818240 && $thisiplong <= 3407818495){return true;}
	if($thisiplong >= 3407819008 && $thisiplong <= 3407819263){return true;}
	if($thisiplong >= 3407819520 && $thisiplong <= 3407819775){return true;}
	if($thisiplong >= 3407820288 && $thisiplong <= 3407820799){return true;}
	if($thisiplong >= 3407824128 && $thisiplong <= 3407824383){return true;}
	if($thisiplong >= 3407824896 && $thisiplong <= 3407825151){return true;}
	if($thisiplong >= 3407826944 && $thisiplong <= 3407827199){return true;}
	if($thisiplong >= 3407828224 && $thisiplong <= 3407828479){return true;}
	if($thisiplong >= 3407831296 && $thisiplong <= 3407831551){return true;}
	if($thisiplong >= 3407833344 && $thisiplong <= 3407833599){return true;}
	if($thisiplong >= 3407833600 && $thisiplong <= 3407833855){return true;}
	if($thisiplong >= 3407834112 && $thisiplong <= 3407834623){return true;}
	if($thisiplong >= 3407838208 && $thisiplong <= 3407838463){return true;}
	if($thisiplong >= 3407847936 && $thisiplong <= 3407848191){return true;}
	if($thisiplong >= 3407851008 && $thisiplong <= 3407851263){return true;}
	if($thisiplong >= 3407851776 && $thisiplong <= 3407852031){return true;}
	if($thisiplong >= 3407852800 && $thisiplong <= 3407853055){return true;}
	if($thisiplong >= 3407854336 && $thisiplong <= 3407854591){return true;}
	if($thisiplong >= 3407854848 && $thisiplong <= 3407855103){return true;}
	if($thisiplong >= 3407858688 && $thisiplong <= 3407858943){return true;}
	if($thisiplong >= 3407862784 && $thisiplong <= 3407863039){return true;}
	if($thisiplong >= 3407863296 && $thisiplong <= 3407863807){return true;}
	if($thisiplong >= 3407864064 && $thisiplong <= 3407864319){return true;}
	if($thisiplong >= 3407865088 && $thisiplong <= 3407865343){return true;}
	if($thisiplong >= 3407869952 && $thisiplong <= 3407870463){return true;}
	if($thisiplong >= 3407871232 && $thisiplong <= 3407871487){return true;}
	if($thisiplong >= 3407877120 && $thisiplong <= 3407877375){return true;}
	if($thisiplong >= 3407884288 && $thisiplong <= 3407884799){return true;}
	if($thisiplong >= 3407886336 && $thisiplong <= 3407886591){return true;}
	if($thisiplong >= 3407887360 && $thisiplong <= 3407887615){return true;}
	if($thisiplong >= 3407887872 && $thisiplong <= 3407888127){return true;}
	if($thisiplong >= 3407889408 && $thisiplong <= 3407889919){return true;}
	if($thisiplong >= 3407891456 && $thisiplong <= 3407891711){return true;}
	if($thisiplong >= 3407892736 && $thisiplong <= 3407892991){return true;}
	if($thisiplong >= 3407893504 && $thisiplong <= 3407894015){return true;}
	if($thisiplong >= 3407896320 && $thisiplong <= 3407896575){return true;}
	if($thisiplong >= 3407898112 && $thisiplong <= 3407898367){return true;}
	if($thisiplong >= 3407898880 && $thisiplong <= 3407899135){return true;}
	if($thisiplong >= 3407905280 && $thisiplong <= 3407905535){return true;}
	if($thisiplong >= 3407906048 && $thisiplong <= 3407906303){return true;}
	if($thisiplong >= 3407907840 && $thisiplong <= 3407908095){return true;}
	if($thisiplong >= 3407910912 && $thisiplong <= 3407911167){return true;}
	if($thisiplong >= 3407919616 && $thisiplong <= 3407920127){return true;}
	if($thisiplong >= 3407921152 && $thisiplong <= 3407921407){return true;}
	if($thisiplong >= 3407922176 && $thisiplong <= 3407922431){return true;}
	if($thisiplong >= 3407923968 && $thisiplong <= 3407924223){return true;}
	if($thisiplong >= 3407924224 && $thisiplong <= 3407924735){return true;}
	if($thisiplong >= 3407926272 && $thisiplong <= 3407926527){return true;}
	if($thisiplong >= 3407938560 && $thisiplong <= 3407938815){return true;}
	if($thisiplong >= 3407939328 && $thisiplong <= 3407939583){return true;}
	if($thisiplong >= 3407939584 && $thisiplong <= 3407941631){return true;}
	if($thisiplong >= 3407942912 && $thisiplong <= 3407943167){return true;}
	if($thisiplong >= 3407944192 && $thisiplong <= 3407944447){return true;}
	if($thisiplong >= 3407945728 && $thisiplong <= 3407945983){return true;}
	if($thisiplong >= 3407953664 && $thisiplong <= 3407953919){return true;}
	if($thisiplong >= 3407953920 && $thisiplong <= 3407954175){return true;}
	if($thisiplong >= 3407954688 && $thisiplong <= 3407954943){return true;}
	if($thisiplong >= 3407954944 && $thisiplong <= 3407955199){return true;}
	if($thisiplong >= 3407956224 && $thisiplong <= 3407956479){return true;}
	if($thisiplong >= 3407957760 && $thisiplong <= 3407958015){return true;}
	if($thisiplong >= 3407963136 && $thisiplong <= 3407963391){return true;}
	if($thisiplong >= 3407968768 && $thisiplong <= 3407969023){return true;}
	if($thisiplong >= 3407970560 && $thisiplong <= 3407970815){return true;}
	if($thisiplong >= 3407971072 && $thisiplong <= 3407971327){return true;}
	if($thisiplong >= 3407974656 && $thisiplong <= 3407974911){return true;}
	if($thisiplong >= 3407977472 && $thisiplong <= 3407977727){return true;}
	if($thisiplong >= 3407977984 && $thisiplong <= 3407978495){return true;}
	if($thisiplong >= 3407982080 && $thisiplong <= 3407982335){return true;}
	if($thisiplong >= 3407984896 && $thisiplong <= 3407985151){return true;}
	if($thisiplong >= 3407988736 && $thisiplong <= 3407988991){return true;}
	if($thisiplong >= 3407989248 && $thisiplong <= 3407989759){return true;}
	if($thisiplong >= 3407989760 && $thisiplong <= 3407990015){return true;}
	if($thisiplong >= 3407990272 && $thisiplong <= 3407990783){return true;}
	if($thisiplong >= 3407992320 && $thisiplong <= 3407992831){return true;}
	if($thisiplong >= 3407994880 && $thisiplong <= 3407995391){return true;}
	if($thisiplong >= 3407995392 && $thisiplong <= 3407995647){return true;}
	if($thisiplong >= 3407997184 && $thisiplong <= 3407997439){return true;}
	if($thisiplong >= 3407999744 && $thisiplong <= 3407999999){return true;}
	if($thisiplong >= 3408001536 && $thisiplong <= 3408001791){return true;}
	if($thisiplong >= 3408004096 && $thisiplong <= 3408004351){return true;}
	if($thisiplong >= 3408008448 && $thisiplong <= 3408008703){return true;}
	if($thisiplong >= 3408009984 && $thisiplong <= 3408010239){return true;}
	if($thisiplong >= 3408013056 && $thisiplong <= 3408013311){return true;}
	if($thisiplong >= 3408015360 && $thisiplong <= 3408015871){return true;}
	if($thisiplong >= 3408016896 && $thisiplong <= 3408017151){return true;}
	if($thisiplong >= 3408017408 && $thisiplong <= 3408017919){return true;}
	if($thisiplong >= 3408020224 && $thisiplong <= 3408020479){return true;}
	if($thisiplong >= 3408020736 && $thisiplong <= 3408020991){return true;}
	if($thisiplong >= 3408022528 && $thisiplong <= 3408022783){return true;}
	if($thisiplong >= 3408026624 && $thisiplong <= 3408026879){return true;}
	if($thisiplong >= 3408030208 && $thisiplong <= 3408030463){return true;}
	if($thisiplong >= 3408032000 && $thisiplong <= 3408032255){return true;}
	if($thisiplong >= 3408040704 && $thisiplong <= 3408040959){return true;}
	if($thisiplong >= 3408041472 && $thisiplong <= 3408041727){return true;}
	if($thisiplong >= 3408041984 && $thisiplong <= 3408042495){return true;}
	if($thisiplong >= 3408044288 && $thisiplong <= 3408044543){return true;}
	if($thisiplong >= 3408044544 && $thisiplong <= 3408044799){return true;}
	if($thisiplong >= 3408050944 && $thisiplong <= 3408051199){return true;}
	if($thisiplong >= 3408052224 && $thisiplong <= 3408054271){return true;}
	if($thisiplong >= 3408055296 && $thisiplong <= 3408056319){return true;}
	if($thisiplong >= 3408062464 && $thisiplong <= 3408062719){return true;}
	if($thisiplong >= 3408064512 && $thisiplong <= 3408064767){return true;}
	if($thisiplong >= 3408065024 && $thisiplong <= 3408065279){return true;}
	if($thisiplong >= 3408065792 && $thisiplong <= 3408066047){return true;}
	if($thisiplong >= 3408067328 && $thisiplong <= 3408067583){return true;}
	if($thisiplong >= 3409379840 && $thisiplong <= 3409380351){return true;}
	if($thisiplong >= 3409380352 && $thisiplong <= 3409380607){return true;}
	if($thisiplong >= 3409381888 && $thisiplong <= 3409382143){return true;}
	if($thisiplong >= 3409382656 && $thisiplong <= 3409382911){return true;}
	if($thisiplong >= 3409384960 && $thisiplong <= 3409385215){return true;}
	if($thisiplong >= 3409387008 && $thisiplong <= 3409387263){return true;}
	if($thisiplong >= 3409403136 && $thisiplong <= 3409403391){return true;}
	if($thisiplong >= 3409405184 && $thisiplong <= 3409405439){return true;}
	if($thisiplong >= 3409407232 && $thisiplong <= 3409407487){return true;}
	if($thisiplong >= 3409407488 && $thisiplong <= 3409407743){return true;}
	if($thisiplong >= 3409409024 && $thisiplong <= 3409409535){return true;}
	if($thisiplong >= 3409409792 && $thisiplong <= 3409410047){return true;}
	if($thisiplong >= 3409412096 && $thisiplong <= 3409412607){return true;}
	if($thisiplong >= 3409416704 && $thisiplong <= 3409417215){return true;}
	if($thisiplong >= 3409428480 && $thisiplong <= 3409428735){return true;}
	if($thisiplong >= 3409429504 && $thisiplong <= 3409429759){return true;}
	if($thisiplong >= 3409435136 && $thisiplong <= 3409435647){return true;}
	if($thisiplong >= 3409435904 && $thisiplong <= 3409436159){return true;}
	if($thisiplong >= 3409436672 && $thisiplong <= 3409436927){return true;}
	if($thisiplong >= 3409445120 && $thisiplong <= 3409445375){return true;}
	if($thisiplong >= 3409445888 && $thisiplong <= 3409446143){return true;}
	if($thisiplong >= 3409447936 && $thisiplong <= 3409448191){return true;}
	if($thisiplong >= 3409451008 && $thisiplong <= 3409451263){return true;}
	if($thisiplong >= 3409454592 && $thisiplong <= 3409454847){return true;}
	if($thisiplong >= 3409455104 && $thisiplong <= 3409455359){return true;}
	if($thisiplong >= 3409456640 && $thisiplong <= 3409456895){return true;}
	if($thisiplong >= 3409457152 && $thisiplong <= 3409459199){return true;}
	if($thisiplong >= 3409462272 && $thisiplong <= 3409462783){return true;}
	if($thisiplong >= 3409465856 && $thisiplong <= 3409466367){return true;}
	if($thisiplong >= 3409466368 && $thisiplong <= 3409466879){return true;}
	if($thisiplong >= 3409469184 && $thisiplong <= 3409469439){return true;}
	if($thisiplong >= 3409473024 && $thisiplong <= 3409473279){return true;}
	if($thisiplong >= 3409475840 && $thisiplong <= 3409476095){return true;}
	if($thisiplong >= 3409486080 && $thisiplong <= 3409486335){return true;}
	if($thisiplong >= 3409488128 && $thisiplong <= 3409488383){return true;}
	if($thisiplong >= 3409488896 && $thisiplong <= 3409489407){return true;}
	if($thisiplong >= 3409489664 && $thisiplong <= 3409489919){return true;}
	if($thisiplong >= 3409491712 && $thisiplong <= 3409491967){return true;}
	if($thisiplong >= 3409492224 && $thisiplong <= 3409492479){return true;}
	if($thisiplong >= 3409492736 && $thisiplong <= 3409492991){return true;}
	if($thisiplong >= 3409494016 && $thisiplong <= 3409494271){return true;}
	if($thisiplong >= 3409495552 && $thisiplong <= 3409495807){return true;}
	if($thisiplong >= 3409496320 && $thisiplong <= 3409496575){return true;}
	if($thisiplong >= 3409498112 && $thisiplong <= 3409498623){return true;}
	if($thisiplong >= 3409498624 && $thisiplong <= 3409498879){return true;}
	if($thisiplong >= 3409499648 && $thisiplong <= 3409499903){return true;}
	if($thisiplong >= 3409500160 && $thisiplong <= 3409500415){return true;}
	if($thisiplong >= 3409502976 && $thisiplong <= 3409503231){return true;}
	if($thisiplong >= 3409503232 && $thisiplong <= 3409503487){return true;}
	if($thisiplong >= 3409504256 && $thisiplong <= 3409504511){return true;}
	if($thisiplong >= 3409506304 && $thisiplong <= 3409506559){return true;}
	if($thisiplong >= 3409509376 && $thisiplong <= 3409509631){return true;}
	if($thisiplong >= 3409509888 && $thisiplong <= 3409510143){return true;}
	if($thisiplong >= 3409511680 && $thisiplong <= 3409511935){return true;}
	if($thisiplong >= 3409511936 && $thisiplong <= 3409512191){return true;}
	if($thisiplong >= 3409513472 && $thisiplong <= 3409513983){return true;}
	if($thisiplong >= 3409517568 && $thisiplong <= 3409517823){return true;}
	if($thisiplong >= 3409520384 && $thisiplong <= 3409520639){return true;}
	if($thisiplong >= 3409522176 && $thisiplong <= 3409522431){return true;}
	if($thisiplong >= 3409525248 && $thisiplong <= 3409525503){return true;}
	if($thisiplong >= 3409526016 && $thisiplong <= 3409526271){return true;}
	if($thisiplong >= 3409527296 && $thisiplong <= 3409527551){return true;}
	if($thisiplong >= 3409528064 && $thisiplong <= 3409528319){return true;}
	if($thisiplong >= 3409528320 && $thisiplong <= 3409528831){return true;}
	if($thisiplong >= 3409529088 && $thisiplong <= 3409529343){return true;}
	if($thisiplong >= 3409533440 && $thisiplong <= 3409533695){return true;}
	if($thisiplong >= 3409536256 && $thisiplong <= 3409536511){return true;}
	if($thisiplong >= 3409538304 && $thisiplong <= 3409538559){return true;}
	if($thisiplong >= 3409541888 && $thisiplong <= 3409542143){return true;}
	if($thisiplong >= 3409550592 && $thisiplong <= 3409550847){return true;}
	if($thisiplong >= 3409561600 && $thisiplong <= 3409561855){return true;}
	if($thisiplong >= 3409562112 && $thisiplong <= 3409562367){return true;}
	if($thisiplong >= 3409563136 && $thisiplong <= 3409563391){return true;}
	if($thisiplong >= 3409567232 && $thisiplong <= 3409567487){return true;}
	if($thisiplong >= 3409567744 && $thisiplong <= 3409571839){return true;}
	if($thisiplong >= 3409573376 && $thisiplong <= 3409573887){return true;}
	if($thisiplong >= 3409574144 && $thisiplong <= 3409574399){return true;}
	if($thisiplong >= 3409575168 && $thisiplong <= 3409575423){return true;}
	if($thisiplong >= 3409575424 && $thisiplong <= 3409575935){return true;}
	if($thisiplong >= 3409838592 && $thisiplong <= 3409838847){return true;}
	if($thisiplong >= 3409871616 && $thisiplong <= 3409871871){return true;}
	if($thisiplong >= 3409873664 && $thisiplong <= 3409873919){return true;}
	if($thisiplong >= 3409879296 && $thisiplong <= 3409879551){return true;}
	if($thisiplong >= 3409888512 && $thisiplong <= 3409888767){return true;}
	if($thisiplong >= 3409896448 && $thisiplong <= 3409897471){return true;}
	if($thisiplong >= 3409897984 && $thisiplong <= 3409898239){return true;}
	if($thisiplong >= 3409901056 && $thisiplong <= 3409901311){return true;}
	if($thisiplong >= 3410796544 && $thisiplong <= 3410797567){return true;}
	if($thisiplong >= 3410798592 && $thisiplong <= 3410799615){return true;}
	if($thisiplong >= 3410867200 && $thisiplong <= 3410868223){return true;}
	if($thisiplong >= 3410898944 && $thisiplong <= 3410903039){return true;}
	if($thisiplong >= 3410952192 && $thisiplong <= 3410956287){return true;}
	if($thisiplong >= 3410960384 && $thisiplong <= 3410964479){return true;}
	
	if($thisiplong >= 3411018752 && $thisiplong <= 3411019263){return true;}
	if($thisiplong >= 3411025920 && $thisiplong <= 3411030015){return true;}
	if($thisiplong >= 3411032320 && $thisiplong <= 3411032575){return true;}
	if($thisiplong >= 3411051520 && $thisiplong <= 3411052543){return true;}
	if($thisiplong >= 3411052544 && $thisiplong <= 3411054591){return true;}
	if($thisiplong >= 3411054592 && $thisiplong <= 3411058687){return true;}
	if($thisiplong >= 3411083264 && $thisiplong <= 3411085311){return true;}
	if($thisiplong >= 3411087360 && $thisiplong <= 3411091455){return true;}
	if($thisiplong >= 3411148800 && $thisiplong <= 3411149311){return true;}
	if($thisiplong >= 3411152896 && $thisiplong <= 3411154943){return true;}
	if($thisiplong >= 3411214336 && $thisiplong <= 3411215359){return true;}
	if($thisiplong >= 3411228672 && $thisiplong <= 3411230719){return true;}
	if($thisiplong >= 3411271680 && $thisiplong <= 3411275775){return true;}
	if($thisiplong >= 3411410944 && $thisiplong <= 3411419135){return true;}
	if($thisiplong >= 3411419136 && $thisiplong <= 3411427327){return true;}
	if($thisiplong >= 3411427328 && $thisiplong <= 3411431423){return true;}
	if($thisiplong >= 3411431424 && $thisiplong <= 3411435519){return true;}
	if($thisiplong >= 3411435520 && $thisiplong <= 3411443711){return true;}
	if($thisiplong >= 3411475968 && $thisiplong <= 3411476479){return true;}
	if($thisiplong >= 3411550208 && $thisiplong <= 3411558399){return true;}
	if($thisiplong >= 3411591168 && $thisiplong <= 3411599359){return true;}
	if($thisiplong >= 3411607552 && $thisiplong <= 3411608575){return true;}
	if($thisiplong >= 3411609600 && $thisiplong <= 3411611647){return true;}
	if($thisiplong >= 3411642368 && $thisiplong <= 3411643391){return true;}
	if($thisiplong >= 3411673088 && $thisiplong <= 3411674111){return true;}
	if($thisiplong >= 3411675136 && $thisiplong <= 3411676159){return true;}
	if($thisiplong >= 3411705856 && $thisiplong <= 3411714047){return true;}
	if($thisiplong >= 3411714048 && $thisiplong <= 3411722239){return true;}
	if($thisiplong >= 3411722240 && $thisiplong <= 3411730431){return true;}
	if($thisiplong >= 3411746816 && $thisiplong <= 3411755007){return true;}
	if($thisiplong >= 3411763200 && $thisiplong <= 3411767295){return true;}
	if($thisiplong >= 3411769344 && $thisiplong <= 3411771391){return true;}
	if($thisiplong >= 3411804160 && $thisiplong <= 3411805183){return true;}
	if($thisiplong >= 3411845120 && $thisiplong <= 3411853311){return true;}
	if($thisiplong >= 3411869696 && $thisiplong <= 3411870719){return true;}
	if($thisiplong >= 3411870720 && $thisiplong <= 3411871743){return true;}
	if($thisiplong >= 3411871744 && $thisiplong <= 3411871999){return true;}
	if($thisiplong >= 3411872000 && $thisiplong <= 3411872255){return true;}
	if($thisiplong >= 3411872256 && $thisiplong <= 3411872767){return true;}
	if($thisiplong >= 3411872768 && $thisiplong <= 3411873791){return true;}
	if($thisiplong >= 3411873792 && $thisiplong <= 3411877887){return true;}
	if($thisiplong >= 3411877888 && $thisiplong <= 3411886079){return true;}
	if($thisiplong >= 3411886080 && $thisiplong <= 3411902463){return true;}
	if($thisiplong >= 3411902464 && $thisiplong <= 3411904511){return true;}
	if($thisiplong >= 3411904512 && $thisiplong <= 3411905535){return true;}
	if($thisiplong >= 3411905536 && $thisiplong <= 3411905791){return true;}
	if($thisiplong >= 3411905792 && $thisiplong <= 3411906047){return true;}
	if($thisiplong >= 3411906048 && $thisiplong <= 3411906559){return true;}
	if($thisiplong >= 3411906560 && $thisiplong <= 3411910655){return true;}
	if($thisiplong >= 3411910656 && $thisiplong <= 3411918847){return true;}
	if($thisiplong >= 3411918848 && $thisiplong <= 3411935231){return true;}
	if($thisiplong >= 3411935232 && $thisiplong <= 3411936255){return true;}
	if($thisiplong >= 3411936256 && $thisiplong <= 3411937279){return true;}
	if($thisiplong >= 3411937280 && $thisiplong <= 3411939327){return true;}
	if($thisiplong >= 3411939328 && $thisiplong <= 3411943423){return true;}
	if($thisiplong >= 3412000768 && $thisiplong <= 3412002815){return true;}
	if($thisiplong >= 3412025344 && $thisiplong <= 3412029439){return true;}
	if($thisiplong >= 3412029440 && $thisiplong <= 3412033535){return true;}
	if($thisiplong >= 3412033536 && $thisiplong <= 3412049919){return true;}
	if($thisiplong >= 3412058112 && $thisiplong <= 3412066303){return true;}
	if($thisiplong >= 3412264960 && $thisiplong <= 3412267007){return true;}
	if($thisiplong >= 3412267008 && $thisiplong <= 3412271103){return true;}
	if($thisiplong >= 3412283392 && $thisiplong <= 3412287487){return true;}
	if($thisiplong >= 3412336640 && $thisiplong <= 3412340735){return true;}
	if($thisiplong >= 3412340736 && $thisiplong <= 3412342783){return true;}
	if($thisiplong >= 3412344576 && $thisiplong <= 3412344831){return true;}
	if($thisiplong >= 3412348928 && $thisiplong <= 3412353023){return true;}
	if($thisiplong >= 3412353024 && $thisiplong <= 3412361215){return true;}
	if($thisiplong >= 3412377600 && $thisiplong <= 3412381695){return true;}
	if($thisiplong >= 3412598784 && $thisiplong <= 3412602879){return true;}
	if($thisiplong >= 3412680704 && $thisiplong <= 3412688895){return true;}
	if($thisiplong >= 3412688896 && $thisiplong <= 3412697087){return true;}
	if($thisiplong >= 3412787200 && $thisiplong <= 3412819967){return true;}
	if($thisiplong >= 3413024768 && $thisiplong <= 3413032959){return true;}
	if($thisiplong >= 3413037056 && $thisiplong <= 3413041151){return true;}
	if($thisiplong >= 3413043200 && $thisiplong <= 3413043711){return true;}
	if($thisiplong >= 3413043712 && $thisiplong <= 3413043967){return true;}
	if($thisiplong >= 3413308416 && $thisiplong <= 3413309439){return true;}
	if($thisiplong >= 3413557248 && $thisiplong <= 3413565439){return true;}
	if($thisiplong >= 3413569792 && $thisiplong <= 3413570047){return true;}
	if($thisiplong >= 3413571584 && $thisiplong <= 3413572607){return true;}
	if($thisiplong >= 3413579776 && $thisiplong <= 3413581823){return true;}
	if($thisiplong >= 3413581824 && $thisiplong <= 3413582847){return true;}
	if($thisiplong >= 3413594112 && $thisiplong <= 3413595135){return true;}
	if($thisiplong >= 3413595392 && $thisiplong <= 3413595647){return true;}
	if($thisiplong >= 3413602560 && $thisiplong <= 3413602815){return true;}
	if($thisiplong >= 3413602816 && $thisiplong <= 3413603327){return true;}
	if($thisiplong >= 3413603328 && $thisiplong <= 3413604351){return true;}
	if($thisiplong >= 3413604352 && $thisiplong <= 3413606399){return true;}
	if($thisiplong >= 3413606400 && $thisiplong <= 3413639167){return true;}
	if($thisiplong >= 3414171648 && $thisiplong <= 3414179839){return true;}
	if($thisiplong >= 3414188032 && $thisiplong <= 3414196223){return true;}
	if($thisiplong >= 3414220800 && $thisiplong <= 3414222847){return true;}
	if($thisiplong >= 3414231040 && $thisiplong <= 3414233087){return true;}
	if($thisiplong >= 3414302720 && $thisiplong <= 3414310911){return true;}
	if($thisiplong >= 3414433792 && $thisiplong <= 3414441983){return true;}
	if($thisiplong >= 3414618112 && $thisiplong <= 3414620159){return true;}
	if($thisiplong >= 3414646784 && $thisiplong <= 3414650879){return true;}
	if($thisiplong >= 3414650880 && $thisiplong <= 3414654975){return true;}
	if($thisiplong >= 3414663168 && $thisiplong <= 3414667263){return true;}
	if($thisiplong >= 3415138304 && $thisiplong <= 3415146495){return true;}
	if($thisiplong >= 3415236608 && $thisiplong <= 3415244799){return true;}
	if($thisiplong >= 3415277568 && $thisiplong <= 3415285759){return true;}
	if($thisiplong >= 3415474176 && $thisiplong <= 3415490559){return true;}
	if($thisiplong >= 3415490560 && $thisiplong <= 3415494655){return true;}
	if($thisiplong >= 3415494656 && $thisiplong <= 3415495679){return true;}
	if($thisiplong >= 3415496192 && $thisiplong <= 3415496703){return true;}
	if($thisiplong >= 3415563264 && $thisiplong <= 3415564287){return true;}
	if($thisiplong >= 3415752704 && $thisiplong <= 3415760895){return true;}
	if($thisiplong >= 3415769088 && $thisiplong <= 3415777279){return true;}
	if($thisiplong >= 3415801856 && $thisiplong <= 3415802879){return true;}
	if($thisiplong >= 3416047616 && $thisiplong <= 3416063999){return true;}
	if($thisiplong >= 3416133632 && $thisiplong <= 3416135679){return true;}
	if($thisiplong >= 3416287232 && $thisiplong <= 3416289279){return true;}
	if($thisiplong >= 3416293632 && $thisiplong <= 3416293887){return true;}
	if($thisiplong >= 3416309760 && $thisiplong <= 3416317951){return true;}
	if($thisiplong >= 3416326144 && $thisiplong <= 3416327167){return true;}
	if($thisiplong >= 3416372224 && $thisiplong <= 3416372479){return true;}
	if($thisiplong >= 3416375296 && $thisiplong <= 3416383487){return true;}
	if($thisiplong >= 3416694784 && $thisiplong <= 3416702975){return true;}
	if($thisiplong >= 3416784896 && $thisiplong <= 3416793087){return true;}
	if($thisiplong >= 3416930816 && $thisiplong <= 3416931327){return true;}
	if($thisiplong >= 3416981504 && $thisiplong <= 3416982527){return true;}
	if($thisiplong >= 3417038848 && $thisiplong <= 3417042943){return true;}
	if($thisiplong >= 3417179136 && $thisiplong <= 3417179391){return true;}
	if($thisiplong >= 3417179904 && $thisiplong <= 3417180159){return true;}
	if($thisiplong >= 3417202688 && $thisiplong <= 3417210879){return true;}
	if($thisiplong >= 3417276416 && $thisiplong <= 3417284607){return true;}
	if($thisiplong >= 3417292800 && $thisiplong <= 3417309183){return true;}
	if($thisiplong >= 3417309184 && $thisiplong <= 3417325567){return true;}
	if($thisiplong >= 3417325568 && $thisiplong <= 3417333759){return true;}
	if($thisiplong >= 3417352192 && $thisiplong <= 3417354239){return true;}
	if($thisiplong >= 3417853952 && $thisiplong <= 3417858047){return true;}
	if($thisiplong >= 3418071040 && $thisiplong <= 3418079231){return true;}
	if($thisiplong >= 3418161152 && $thisiplong <= 3418161663){return true;}
	if($thisiplong >= 3418162688 && $thisiplong <= 3418163199){return true;}
	if($thisiplong >= 3418189824 && $thisiplong <= 3418190847){return true;}
	if($thisiplong >= 3418210304 && $thisiplong <= 3418218495){return true;}
	if($thisiplong >= 3418251264 && $thisiplong <= 3418255359){return true;}
	if($thisiplong >= 3418290432 && $thisiplong <= 3418290687){return true;}
	if($thisiplong >= 3418292224 && $thisiplong <= 3418292735){return true;}
	if($thisiplong >= 3418296320 && $thisiplong <= 3418300415){return true;}
	if($thisiplong >= 3418308608 && $thisiplong <= 3418324991){return true;}
	if($thisiplong >= 3418329088 && $thisiplong <= 3418331135){return true;}
	if($thisiplong >= 3418331136 && $thisiplong <= 3418333183){return true;}
	if($thisiplong >= 3418357760 && $thisiplong <= 3418365951){return true;}
	if($thisiplong >= 3418480640 && $thisiplong <= 3418488831){return true;}
	if($thisiplong >= 3418519552 && $thisiplong <= 3418521599){return true;}
	if($thisiplong >= 3418570752 && $thisiplong <= 3418578943){return true;}
	if($thisiplong >= 3418583040 && $thisiplong <= 3418585087){return true;}
	if($thisiplong >= 3418587136 && $thisiplong <= 3418619903){return true;}
	if($thisiplong >= 3418619904 && $thisiplong <= 3418621951){return true;}
	if($thisiplong >= 3418621952 && $thisiplong <= 3418623999){return true;}
	if($thisiplong >= 3419073536 && $thisiplong <= 3419074559){return true;}
	if($thisiplong >= 3419226112 && $thisiplong <= 3419234303){return true;}
	if($thisiplong >= 3419242496 && $thisiplong <= 3419275263){return true;}
	if($thisiplong >= 3419357184 && $thisiplong <= 3419373567){return true;}
	if($thisiplong >= 3419373568 && $thisiplong <= 3419406335){return true;}
	if($thisiplong >= 3419406336 && $thisiplong <= 3419410431){return true;}
	if($thisiplong >= 3419410432 && $thisiplong <= 3419411455){return true;}
	if($thisiplong >= 3419414528 && $thisiplong <= 3419422719){return true;}
	if($thisiplong >= 3419529216 && $thisiplong <= 3419537407){return true;}
	if($thisiplong >= 3419668480 && $thisiplong <= 3419672575){return true;}
	if($thisiplong >= 3419688960 && $thisiplong <= 3419693055){return true;}
	if($thisiplong >= 3419924480 && $thisiplong <= 3419926527){return true;}
	if($thisiplong >= 3420372992 && $thisiplong <= 3420377087){return true;}
	if($thisiplong >= 3420389376 && $thisiplong <= 3420393471){return true;}
	if($thisiplong >= 3420393472 && $thisiplong <= 3420395519){return true;}
	if($thisiplong >= 3523346432 && $thisiplong <= 3523350527){return true;}
	if($thisiplong >= 3523350528 && $thisiplong <= 3523354623){return true;}
	if($thisiplong >= 3523543040 && $thisiplong <= 3523551231){return true;}
	if($thisiplong >= 3523557376 && $thisiplong <= 3523559423){return true;}
	if($thisiplong >= 3523579904 && $thisiplong <= 3523583999){return true;}
	if($thisiplong >= 3524001792 && $thisiplong <= 3524018175){return true;}
	if($thisiplong >= 3524018176 && $thisiplong <= 3524034559){return true;}
	if($thisiplong >= 3524034560 && $thisiplong <= 3524050943){return true;}
	if($thisiplong >= 3524050944 && $thisiplong <= 3524067327){return true;}
	if($thisiplong >= 3524067328 && $thisiplong <= 3524083711){return true;}
	if($thisiplong >= 3524083712 && $thisiplong <= 3524100095){return true;}
	if($thisiplong >= 3524100096 && $thisiplong <= 3524132863){return true;}
	if($thisiplong >= 3524149248 && $thisiplong <= 3524157439){return true;}
	if($thisiplong >= 3524161536 && $thisiplong <= 3524165631){return true;}
	if($thisiplong >= 3524165632 && $thisiplong <= 3524173823){return true;}
	if($thisiplong >= 3524173824 && $thisiplong <= 3524182015){return true;}
	if($thisiplong >= 3524182016 && $thisiplong <= 3524190207){return true;}
	if($thisiplong >= 3524190208 && $thisiplong <= 3524198399){return true;}
	if($thisiplong >= 3524198400 && $thisiplong <= 3524206591){return true;}
	if($thisiplong >= 3524206592 && $thisiplong <= 3524214783){return true;}
	if($thisiplong >= 3524214784 && $thisiplong <= 3524222975){return true;}
	if($thisiplong >= 3524222976 && $thisiplong <= 3524231167){return true;}
	if($thisiplong >= 3524231168 && $thisiplong <= 3524247551){return true;}
	if($thisiplong >= 3524296704 && $thisiplong <= 3524313087){return true;}
	if($thisiplong >= 3524591616 && $thisiplong <= 3524624383){return true;}
	if($thisiplong >= 3524624384 && $thisiplong <= 3524657151){return true;}
	if($thisiplong >= 3524657152 && $thisiplong <= 3524722687){return true;}
	if($thisiplong >= 3524730880 && $thisiplong <= 3524739071){return true;}
	if($thisiplong >= 3524853760 && $thisiplong <= 3524919295){return true;}
	if($thisiplong >= 3524919296 && $thisiplong <= 3525050367){return true;}
	if($thisiplong >= 3525050368 && $thisiplong <= 3525312511){return true;}
	if($thisiplong >= 3525312512 && $thisiplong <= 3525574655){return true;}
	if($thisiplong >= 3525574656 && $thisiplong <= 3525836799){return true;}
	if($thisiplong >= 3525836800 && $thisiplong <= 3526361087){return true;}
	if($thisiplong >= 3526395904 && $thisiplong <= 3526397951){return true;}
	if($thisiplong >= 3526557696 && $thisiplong <= 3526623231){return true;}
	if($thisiplong >= 3526623232 && $thisiplong <= 3526639615){return true;}
	if($thisiplong >= 3526639616 && $thisiplong <= 3526655999){return true;}
	if($thisiplong >= 3526656000 && $thisiplong <= 3526688767){return true;}
	if($thisiplong >= 3526688768 && $thisiplong <= 3526721535){return true;}
	if($thisiplong >= 3526721536 && $thisiplong <= 3526754303){return true;}
	if($thisiplong >= 3526934528 && $thisiplong <= 3526942719){return true;}
	if($thisiplong >= 3527933952 && $thisiplong <= 3527966719){return true;}
	if($thisiplong >= 3527966720 && $thisiplong <= 3527974911){return true;}
	if($thisiplong >= 3527974912 && $thisiplong <= 3527983103){return true;}
	if($thisiplong >= 3527983104 && $thisiplong <= 3527999487){return true;}
	if($thisiplong >= 3527999488 && $thisiplong <= 3528007679){return true;}
	if($thisiplong >= 3528007680 && $thisiplong <= 3528015871){return true;}
	if($thisiplong >= 3528015872 && $thisiplong <= 3528032255){return true;}
	if($thisiplong >= 3528032256 && $thisiplong <= 3528065023){return true;}
	if($thisiplong >= 3528065024 && $thisiplong <= 3528073215){return true;}
	if($thisiplong >= 3528073216 && $thisiplong <= 3528081407){return true;}
	if($thisiplong >= 3528081408 && $thisiplong <= 3528089599){return true;}
	if($thisiplong >= 3528089600 && $thisiplong <= 3528097791){return true;}
	if($thisiplong >= 3528097792 && $thisiplong <= 3528105983){return true;}
	if($thisiplong >= 3528105984 && $thisiplong <= 3528114175){return true;}
	if($thisiplong >= 3528114176 && $thisiplong <= 3528130559){return true;}
	if($thisiplong >= 3528130560 && $thisiplong <= 3528196095){return true;}
	if($thisiplong >= 3528196096 && $thisiplong <= 3528204287){return true;}
	if($thisiplong >= 3528204288 && $thisiplong <= 3528212479){return true;}
	if($thisiplong >= 3528212480 && $thisiplong <= 3528228863){return true;}
	if($thisiplong >= 3528228864 && $thisiplong <= 3528261631){return true;}
	if($thisiplong >= 3528261632 && $thisiplong <= 3528327167){return true;}
	if($thisiplong >= 3528327168 && $thisiplong <= 3528335359){return true;}
	if($thisiplong >= 3528335360 && $thisiplong <= 3528343551){return true;}
	if($thisiplong >= 3528343552 && $thisiplong <= 3528359935){return true;}
	if($thisiplong >= 3528359936 && $thisiplong <= 3528368127){return true;}
	if($thisiplong >= 3528368128 && $thisiplong <= 3528376319){return true;}
	if($thisiplong >= 3528376320 && $thisiplong <= 3528392703){return true;}
	if($thisiplong >= 3528409088 && $thisiplong <= 3528425471){return true;}
	if($thisiplong >= 3528450048 && $thisiplong <= 3528458239){return true;}
	if($thisiplong >= 3528589312 && $thisiplong <= 3528720383){return true;}
	if($thisiplong >= 3528949760 && $thisiplong <= 3528953855){return true;}
	if($thisiplong >= 3528953856 && $thisiplong <= 3528957951){return true;}
	if($thisiplong >= 3528957952 && $thisiplong <= 3528966143){return true;}
	if($thisiplong >= 3535388672 && $thisiplong <= 3535405055){return true;}
	if($thisiplong >= 3535822848 && $thisiplong <= 3535831039){return true;}
	if($thisiplong >= 3544186880 && $thisiplong <= 3544449023){return true;}
	if($thisiplong >= 3544449024 && $thisiplong <= 3544580095){return true;}
	if($thisiplong >= 3544580096 && $thisiplong <= 3544711167){return true;}
	if($thisiplong >= 3545235456 && $thisiplong <= 3545300991){return true;}
	if($thisiplong >= 3545300992 && $thisiplong <= 3545366527){return true;}
	if($thisiplong >= 3545366528 && $thisiplong <= 3545432063){return true;}
	if($thisiplong >= 3545432064 && $thisiplong <= 3545497599){return true;}
	if($thisiplong >= 3545497600 && $thisiplong <= 3545628671){return true;}
	if($thisiplong >= 3545628672 && $thisiplong <= 3545759743){return true;}
	if($thisiplong >= 3545759744 && $thisiplong <= 3545825279){return true;}
	if($thisiplong >= 3545825280 && $thisiplong <= 3545890815){return true;}
	if($thisiplong >= 3545890816 && $thisiplong <= 3546021887){return true;}
	if($thisiplong >= 3546021888 && $thisiplong <= 3546152959){return true;}
	if($thisiplong >= 3546152960 && $thisiplong <= 3546284031){return true;}
	if($thisiplong >= 3546284032 && $thisiplong <= 3546415103){return true;}
	if($thisiplong >= 3546415104 && $thisiplong <= 3546480639){return true;}
	if($thisiplong >= 3546480640 && $thisiplong <= 3546497023){return true;}
	if($thisiplong >= 3546497024 && $thisiplong <= 3546505215){return true;}
	if($thisiplong >= 3546505216 && $thisiplong <= 3546513407){return true;}
	if($thisiplong >= 3546513408 && $thisiplong <= 3546546175){return true;}
	if($thisiplong >= 3546546176 && $thisiplong <= 3546611711){return true;}
	if($thisiplong >= 3546611712 && $thisiplong <= 3546628095){return true;}
	if($thisiplong >= 3546628096 && $thisiplong <= 3546644479){return true;}
	if($thisiplong >= 3546644480 && $thisiplong <= 3546677247){return true;}
	if($thisiplong >= 3546677248 && $thisiplong <= 3546742783){return true;}
	if($thisiplong >= 3546742784 && $thisiplong <= 3546775551){return true;}
	if($thisiplong >= 3546775552 && $thisiplong <= 3546808319){return true;}
	if($thisiplong >= 3548905472 && $thisiplong <= 3549167615){return true;}
	if($thisiplong >= 3549167616 && $thisiplong <= 3549298687){return true;}
	if($thisiplong >= 3549298688 && $thisiplong <= 3549331455){return true;}
	if($thisiplong >= 3549331456 && $thisiplong <= 3549364223){return true;}
	if($thisiplong >= 3549364224 && $thisiplong <= 3549429759){return true;}
	if($thisiplong >= 3549429760 && $thisiplong <= 3549560831){return true;}
	if($thisiplong >= 3549560832 && $thisiplong <= 3549626367){return true;}
	if($thisiplong >= 3549626368 && $thisiplong <= 3549691903){return true;}
	if($thisiplong >= 3549691904 && $thisiplong <= 3549954047){return true;}
	if($thisiplong >= 3549954048 && $thisiplong <= 3550085119){return true;}
	if($thisiplong >= 3550085120 && $thisiplong <= 3550150655){return true;}
	if($thisiplong >= 3550150656 && $thisiplong <= 3550167039){return true;}
	if($thisiplong >= 3550167040 && $thisiplong <= 3550175231){return true;}
	if($thisiplong >= 3550175232 && $thisiplong <= 3550183423){return true;}
	if($thisiplong >= 3550183424 && $thisiplong <= 3550216191){return true;}
	if($thisiplong >= 3550216192 && $thisiplong <= 3550478335){return true;}
	if($thisiplong >= 3550478336 && $thisiplong <= 3550740479){return true;}
	if($thisiplong >= 3550740480 && $thisiplong <= 3551002623){return true;}
	if($thisiplong >= 3657433088 && $thisiplong <= 3657498623){return true;}
	if($thisiplong >= 3657498624 && $thisiplong <= 3657564159){return true;}
	if($thisiplong >= 3657564160 && $thisiplong <= 3657695231){return true;}
	if($thisiplong >= 3657695232 && $thisiplong <= 3657826303){return true;}
	if($thisiplong >= 3657826304 && $thisiplong <= 3657891839){return true;}
	if($thisiplong >= 3657891840 && $thisiplong <= 3657957375){return true;}
	if($thisiplong >= 3657957376 && $thisiplong <= 3658088447){return true;}
	if($thisiplong >= 3658088448 && $thisiplong <= 3658153983){return true;}
	if($thisiplong >= 3658153984 && $thisiplong <= 3658219519){return true;}
	if($thisiplong >= 3658219520 && $thisiplong <= 3658285055){return true;}
	if($thisiplong >= 3658285056 && $thisiplong <= 3658350591){return true;}
	if($thisiplong >= 3658350592 && $thisiplong <= 3658481663){return true;}
	if($thisiplong >= 3658481664 && $thisiplong <= 3658743807){return true;}
	if($thisiplong >= 3658743808 && $thisiplong <= 3658809343){return true;}
	if($thisiplong >= 3658809344 && $thisiplong <= 3658842111){return true;}
	if($thisiplong >= 3658842112 && $thisiplong <= 3658874879){return true;}
	if($thisiplong >= 3658874880 && $thisiplong <= 3659005951){return true;}
	if($thisiplong >= 3659005952 && $thisiplong <= 3659137023){return true;}
	if($thisiplong >= 3659137024 && $thisiplong <= 3659202559){return true;}
	if($thisiplong >= 3659202560 && $thisiplong <= 3659268095){return true;}
	if($thisiplong >= 3659268096 && $thisiplong <= 3659399167){return true;}
	if($thisiplong >= 3659399168 && $thisiplong <= 3659530239){return true;}
	if($thisiplong >= 3661103104 && $thisiplong <= 3661365247){return true;}
	if($thisiplong >= 3661365248 && $thisiplong <= 3661496319){return true;}
	if($thisiplong >= 3661496320 && $thisiplong <= 3661529087){return true;}
	if($thisiplong >= 3661529088 && $thisiplong <= 3661561855){return true;}
	if($thisiplong >= 3661561856 && $thisiplong <= 3661627391){return true;}
	if($thisiplong >= 3661627392 && $thisiplong <= 3661758463){return true;}
	if($thisiplong >= 3661758464 && $thisiplong <= 3661823999){return true;}
	if($thisiplong >= 3661824000 && $thisiplong <= 3661856767){return true;}
	if($thisiplong >= 3661856768 && $thisiplong <= 3661889535){return true;}
	if($thisiplong >= 3661889536 && $thisiplong <= 3662020607){return true;}
	if($thisiplong >= 3662020608 && $thisiplong <= 3662151679){return true;}
	if($thisiplong >= 3662151680 && $thisiplong <= 3662413823){return true;}
	if($thisiplong >= 3662413824 && $thisiplong <= 3662544895){return true;}
	if($thisiplong >= 3662544896 && $thisiplong <= 3662675967){return true;}
	if($thisiplong >= 3662675968 && $thisiplong <= 3662938111){return true;}
	if($thisiplong >= 3662938112 && $thisiplong <= 3663200255){return true;}
	if($thisiplong >= 3663200256 && $thisiplong <= 3663724543){return true;}
	if($thisiplong >= 3663724544 && $thisiplong <= 3663855615){return true;}
	if($thisiplong >= 3663855616 && $thisiplong <= 3663888383){return true;}
	if($thisiplong >= 3663888384 && $thisiplong <= 3663904767){return true;}
	if($thisiplong >= 3663904768 && $thisiplong <= 3663912959){return true;}
	if($thisiplong >= 3663912960 && $thisiplong <= 3663921151){return true;}
	if($thisiplong >= 3663921152 && $thisiplong <= 3663986687){return true;}
	if($thisiplong >= 3664009216 && $thisiplong <= 3664011263){return true;}
	if($thisiplong >= 3664011264 && $thisiplong <= 3664019455){return true;}
	if($thisiplong >= 3664019456 && $thisiplong <= 3664052223){return true;}
	if($thisiplong >= 3664248832 && $thisiplong <= 3664281599){return true;}
	if($thisiplong >= 3664281600 && $thisiplong <= 3664289791){return true;}
	if($thisiplong >= 3664289792 && $thisiplong <= 3664297983){return true;}
	if($thisiplong >= 3664297984 && $thisiplong <= 3664300031){return true;}
	if($thisiplong >= 3664300032 && $thisiplong <= 3664302079){return true;}
	if($thisiplong >= 3664302080 && $thisiplong <= 3664306175){return true;}
	if($thisiplong >= 3664306176 && $thisiplong <= 3664314367){return true;}
	if($thisiplong >= 3664314368 && $thisiplong <= 3664379903){return true;}
	if($thisiplong >= 3664379904 && $thisiplong <= 3664510975){return true;}
	if($thisiplong >= 3664510976 && $thisiplong <= 3664576511){return true;}
	if($thisiplong >= 3664576512 && $thisiplong <= 3664642047){return true;}
	if($thisiplong >= 3669606400 && $thisiplong <= 3669614591){return true;}
	if($thisiplong >= 3669618688 && $thisiplong <= 3669620735){return true;}
	if($thisiplong >= 3670016000 && $thisiplong <= 3670081535){return true;}
	if($thisiplong >= 3670081536 && $thisiplong <= 3670147071){return true;}
	if($thisiplong >= 3670147072 && $thisiplong <= 3670212607){return true;}
	if($thisiplong >= 3670212608 && $thisiplong <= 3670278143){return true;}
	if($thisiplong >= 3670278144 && $thisiplong <= 3670540287){return true;}
	if($thisiplong >= 3670540288 && $thisiplong <= 3670802431){return true;}
	if($thisiplong >= 3670802432 && $thisiplong <= 3670933503){return true;}
	if($thisiplong >= 3670933504 && $thisiplong <= 3671064575){return true;}
	if($thisiplong >= 3673161728 && $thisiplong <= 3673423871){return true;}
	if($thisiplong >= 3673423872 && $thisiplong <= 3673554943){return true;}
	if($thisiplong >= 3673554944 && $thisiplong <= 3673686015){return true;}
	if($thisiplong >= 3673751552 && $thisiplong <= 3673817087){return true;}
	if($thisiplong >= 3678928896 && $thisiplong <= 3678994431){return true;}
	if($thisiplong >= 3679584256 && $thisiplong <= 3679649791){return true;}
	if($thisiplong >= 3679682560 && $thisiplong <= 3679715327){return true;}
	if($thisiplong >= 3682598912 && $thisiplong <= 3683647487){return true;}
	if($thisiplong >= 3683647488 && $thisiplong <= 3683909631){return true;}
	if($thisiplong >= 3683909632 && $thisiplong <= 3683975167){return true;}
	if($thisiplong >= 3683975168 && $thisiplong <= 3684007935){return true;}
	if($thisiplong >= 3684007936 && $thisiplong <= 3684024319){return true;}
	if($thisiplong >= 3684024320 && $thisiplong <= 3684040703){return true;}
	if($thisiplong >= 3684040704 && $thisiplong <= 3684048895){return true;}
	if($thisiplong >= 3684048896 && $thisiplong <= 3684057087){return true;}
	if($thisiplong >= 3684057088 && $thisiplong <= 3684065279){return true;}
	if($thisiplong >= 3684065280 && $thisiplong <= 3684069375){return true;}
	if($thisiplong >= 3684069376 && $thisiplong <= 3684073471){return true;}
	if($thisiplong >= 3684073472 && $thisiplong <= 3684106239){return true;}
	if($thisiplong >= 3684106240 && $thisiplong <= 3684114431){return true;}
	if($thisiplong >= 3684114432 && $thisiplong <= 3684122623){return true;}
	if($thisiplong >= 3684122624 && $thisiplong <= 3684139007){return true;}
	if($thisiplong >= 3684139008 && $thisiplong <= 3684171775){return true;}
	if($thisiplong >= 3684171776 && $thisiplong <= 3684302847){return true;}
	if($thisiplong >= 3684302848 && $thisiplong <= 3684433919){return true;}
	if($thisiplong >= 3684433920 && $thisiplong <= 3684564991){return true;}
	if($thisiplong >= 3684564992 && $thisiplong <= 3684597759){return true;}
	if($thisiplong >= 3684597760 && $thisiplong <= 3684630527){return true;}
	if($thisiplong >= 3684630528 && $thisiplong <= 3684646911){return true;}
	if($thisiplong >= 3684646912 && $thisiplong <= 3684663295){return true;}
	if($thisiplong >= 3684663296 && $thisiplong <= 3684696063){return true;}
	if($thisiplong >= 3688366080 && $thisiplong <= 3688497151){return true;}
	if($thisiplong >= 3688497152 && $thisiplong <= 3688628223){return true;}
	if($thisiplong >= 3688628224 && $thisiplong <= 3688693759){return true;}
	if($thisiplong >= 3688693760 && $thisiplong <= 3688759295){return true;}
	if($thisiplong >= 3688759296 && $thisiplong <= 3688890367){return true;}
	if($thisiplong >= 3688890368 && $thisiplong <= 3689021439){return true;}
	if($thisiplong >= 3689021440 && $thisiplong <= 3689086975){return true;}
	if($thisiplong >= 3689086976 && $thisiplong <= 3689152511){return true;}
	if($thisiplong >= 3689152512 && $thisiplong <= 3689283583){return true;}
	if($thisiplong >= 3689283584 && $thisiplong <= 3689414655){return true;}
	if($thisiplong >= 3689414656 && $thisiplong <= 3689676799){return true;}
	if($thisiplong >= 3689676800 && $thisiplong <= 3689807871){return true;}
	if($thisiplong >= 3689807872 && $thisiplong <= 3689938943){return true;}
	if($thisiplong >= 3690070016 && $thisiplong <= 3690201087){return true;}
	if($thisiplong >= 3690201088 && $thisiplong <= 3690463231){return true;}
	if($thisiplong >= 3697655808 && $thisiplong <= 3697672191){return true;}
	if($thisiplong >= 3698327552 && $thisiplong <= 3698589695){return true;}
	if($thisiplong >= 3700981760 && $thisiplong <= 3701014527){return true;}
	if($thisiplong >= 3701080064 && $thisiplong <= 3701211135){return true;}
	if($thisiplong >= 3701473280 && $thisiplong <= 3703570431){return true;}
	if($thisiplong >= 3703570432 && $thisiplong <= 3703701503){return true;}
	if($thisiplong >= 3703701504 && $thisiplong <= 3703832575){return true;}
	if($thisiplong >= 3703832576 && $thisiplong <= 3704094719){return true;}
	if($thisiplong >= 3704094720 && $thisiplong <= 3704619007){return true;}
	if($thisiplong >= 3706126336 && $thisiplong <= 3706142719){return true;}
	if($thisiplong >= 3706159104 && $thisiplong <= 3706191871){return true;}
	if($thisiplong >= 3706208256 && $thisiplong <= 3706224639){return true;}
	if($thisiplong >= 3706322944 && $thisiplong <= 3706388479){return true;}
	if($thisiplong >= 3706847232 && $thisiplong <= 3706978303){return true;}
	if($thisiplong >= 3707209728 && $thisiplong <= 3707211775){return true;}
	if($thisiplong >= 3707240448 && $thisiplong <= 3707502591){return true;}
	if($thisiplong >= 3707502592 && $thisiplong <= 3707568127){return true;}
	if($thisiplong >= 3707764736 && $thisiplong <= 3707895807){return true;}
	if($thisiplong >= 3707895808 && $thisiplong <= 3707961343){return true;}
	if($thisiplong >= 3707961344 && $thisiplong <= 3707994111){return true;}
	if($thisiplong >= 3707994112 && $thisiplong <= 3708026879){return true;}
	if($thisiplong >= 3708026880 && $thisiplong <= 3708092415){return true;}
	if($thisiplong >= 3708092416 && $thisiplong <= 3708125183){return true;}
	if($thisiplong >= 3708125184 && $thisiplong <= 3708157951){return true;}
	if($thisiplong >= 3708157952 && $thisiplong <= 3708223487){return true;}
	if($thisiplong >= 3708223488 && $thisiplong <= 3708231679){return true;}
	if($thisiplong >= 3708231680 && $thisiplong <= 3708239871){return true;}
	if($thisiplong >= 3708239872 && $thisiplong <= 3708248063){return true;}
	if($thisiplong >= 3708248064 && $thisiplong <= 3708256255){return true;}
	if($thisiplong >= 3708256256 && $thisiplong <= 3708289023){return true;}
	if($thisiplong >= 3708289024 && $thisiplong <= 3708420095){return true;}
	if($thisiplong >= 3708420096 && $thisiplong <= 3708485631){return true;}
	if($thisiplong >= 3708485632 && $thisiplong <= 3708518399){return true;}
	if($thisiplong >= 3708518400 && $thisiplong <= 3708534783){return true;}
	if($thisiplong >= 3708534784 && $thisiplong <= 3708542975){return true;}
	if($thisiplong >= 3708542976 && $thisiplong <= 3708551167){return true;}
	if($thisiplong >= 3708551168 && $thisiplong <= 3708583935){return true;}
	if($thisiplong >= 3708583936 && $thisiplong <= 3708600319){return true;}
	if($thisiplong >= 3708616704 && $thisiplong <= 3708633087){return true;}
	if($thisiplong >= 3708633088 && $thisiplong <= 3708641279){return true;}
	if($thisiplong >= 3708641280 && $thisiplong <= 3708649471){return true;}
	if($thisiplong >= 3708649472 && $thisiplong <= 3708682239){return true;}
	if($thisiplong >= 3708682240 && $thisiplong <= 3708813311){return true;}
	if($thisiplong >= 3715760128 && $thisiplong <= 3715891199){return true;}
	if($thisiplong >= 3716186112 && $thisiplong <= 3716218879){return true;}
	if($thisiplong >= 3716218880 && $thisiplong <= 3716284415){return true;}
	if($thisiplong >= 3716284416 && $thisiplong <= 3716415487){return true;}
	if($thisiplong >= 3716538368 && $thisiplong <= 3716546559){return true;}
	if($thisiplong >= 3716677632 && $thisiplong <= 3716743167){return true;}
	if($thisiplong >= 3716743168 && $thisiplong <= 3716808703){return true;}
	if($thisiplong >= 3719036928 && $thisiplong <= 3719299071){return true;}
	if($thisiplong >= 3719299072 && $thisiplong <= 3719823359){return true;}
	if($thisiplong >= 3720347648 && $thisiplong <= 3720478719){return true;}
	if($thisiplong >= 3720478720 && $thisiplong <= 3720544255){return true;}
	if($thisiplong >= 3720544256 && $thisiplong <= 3720609791){return true;}
	if($thisiplong >= 3720609792 && $thisiplong <= 3720740863){return true;}
	if($thisiplong >= 3720740864 && $thisiplong <= 3720806399){return true;}
	if($thisiplong >= 3720806400 && $thisiplong <= 3720814591){return true;}
	if($thisiplong >= 3720814592 && $thisiplong <= 3720818687){return true;}
	if($thisiplong >= 3720818688 && $thisiplong <= 3720822783){return true;}
	if($thisiplong >= 3720822784 && $thisiplong <= 3720839167){return true;}
	if($thisiplong >= 3720839168 && $thisiplong <= 3720855551){return true;}
	if($thisiplong >= 3720855552 && $thisiplong <= 3720859647){return true;}
	if($thisiplong >= 3720863744 && $thisiplong <= 3720871935){return true;}
	if($thisiplong >= 3720871936 && $thisiplong <= 3721134079){return true;}
	if($thisiplong >= 3721134080 && $thisiplong <= 3721265151){return true;}
	if($thisiplong >= 3721265152 && $thisiplong <= 3721330687){return true;}
	if($thisiplong >= 3721330688 && $thisiplong <= 3721347071){return true;}
	if($thisiplong >= 3721347072 && $thisiplong <= 3721363455){return true;}
	if($thisiplong >= 3721363456 && $thisiplong <= 3721396223){return true;}
	if($thisiplong >= 3721396224 && $thisiplong <= 3721658367){return true;}
	if($thisiplong >= 3721658368 && $thisiplong <= 3721723903){return true;}
	if($thisiplong >= 3721723904 && $thisiplong <= 3721789439){return true;}
	if($thisiplong >= 3721789440 && $thisiplong <= 3721920511){return true;}
	if($thisiplong >= 3721920512 && $thisiplong <= 3722444799){return true;}
	if($thisiplong >= 3722444800 && $thisiplong <= 3722969087){return true;}
	if($thisiplong >= 3722969088 && $thisiplong <= 3723231231){return true;}
	if($thisiplong >= 3723231232 && $thisiplong <= 3723362303){return true;}
	if($thisiplong >= 3723362304 && $thisiplong <= 3723427839){return true;}
	if($thisiplong >= 3723427840 && $thisiplong <= 3723460607){return true;}
	if($thisiplong >= 3723460608 && $thisiplong <= 3723493375){return true;}
	if($thisiplong >= 3725590528 && $thisiplong <= 3725721599){return true;}
	if($thisiplong >= 3725721600 && $thisiplong <= 3725852671){return true;}
	if($thisiplong >= 3725852672 && $thisiplong <= 3725983743){return true;}
	if($thisiplong >= 3725983744 && $thisiplong <= 3726049279){return true;}
	if($thisiplong >= 3726049280 && $thisiplong <= 3726114815){return true;}
	if($thisiplong >= 3726114816 && $thisiplong <= 3726245887){return true;}
	if($thisiplong >= 3726245888 && $thisiplong <= 3726376959){return true;}
	if($thisiplong >= 3726376960 && $thisiplong <= 3726639103){return true;}
	if($thisiplong >= 3726639104 && $thisiplong <= 3728736255){return true;}
	if($thisiplong >= 3728736256 && $thisiplong <= 3729260543){return true;}
	if($thisiplong >= 3729260544 && $thisiplong <= 3729391615){return true;}
	if($thisiplong >= 3729391616 && $thisiplong <= 3729457151){return true;}
	if($thisiplong >= 3729457152 && $thisiplong <= 3729522687){return true;}
	if($thisiplong >= 3729522688 && $thisiplong <= 3729784831){return true;}
	if($thisiplong >= 3729784832 && $thisiplong <= 3729915903){return true;}
	if($thisiplong >= 3729915904 && $thisiplong <= 3729981439){return true;}
	if($thisiplong >= 3729981440 && $thisiplong <= 3730014207){return true;}
	if($thisiplong >= 3730014208 && $thisiplong <= 3730046975){return true;}
	if($thisiplong >= 3730046976 && $thisiplong <= 3730112511){return true;}
	if($thisiplong >= 3730112512 && $thisiplong <= 3730145279){return true;}
	if($thisiplong >= 3730145280 && $thisiplong <= 3730178047){return true;}
	if($thisiplong >= 3730178048 && $thisiplong <= 3730309119){return true;}
	if($thisiplong >= 3730309120 && $thisiplong <= 3730440191){return true;}
	if($thisiplong >= 3730440192 && $thisiplong <= 3730571263){return true;}
	if($thisiplong >= 3730571264 && $thisiplong <= 3730833407){return true;}
	if($thisiplong >= 3732733952 && $thisiplong <= 3732799487){return true;}
	if($thisiplong >= 3732832256 && $thisiplong <= 3732865023){return true;}
	if($thisiplong >= 3732930560 && $thisiplong <= 3733192703){return true;}
	if($thisiplong >= 3733192704 && $thisiplong <= 3733454847){return true;}
	if($thisiplong >= 3733454848 && $thisiplong <= 3733979135){return true;}
	if($thisiplong >= 3735027712 && $thisiplong <= 3735158783){return true;}
	if($thisiplong >= 3735158784 && $thisiplong <= 3735224319){return true;}
	if($thisiplong >= 3735224320 && $thisiplong <= 3735232511){return true;}
	if($thisiplong >= 3735232512 && $thisiplong <= 3735240703){return true;}
	if($thisiplong >= 3735240704 && $thisiplong <= 3735257087){return true;}
	if($thisiplong >= 3735257088 && $thisiplong <= 3735289855){return true;}
	if($thisiplong >= 3735552000 && $thisiplong <= 3735683071){return true;}
	if($thisiplong >= 3735683072 && $thisiplong <= 3735814143){return true;}
	if($thisiplong >= 3735814144 && $thisiplong <= 3735846911){return true;}
	if($thisiplong >= 3735846912 && $thisiplong <= 3735879679){return true;}
	if($thisiplong >= 3735879680 && $thisiplong <= 3735945215){return true;}
	if($thisiplong >= 3735945216 && $thisiplong <= 3736076287){return true;}
	if($thisiplong >= 3736076288 && $thisiplong <= 3736600575){return true;}
	if($thisiplong >= 3736600576 && $thisiplong <= 3737124863){return true;}
	if($thisiplong >= 3737124864 && $thisiplong <= 3737387007){return true;}
	if($thisiplong >= 3737387008 && $thisiplong <= 3737518079){return true;}
	if($thisiplong >= 3737518080 && $thisiplong <= 3737583615){return true;}
	if($thisiplong >= 3737583616 && $thisiplong <= 3737649151){return true;}
	if($thisiplong >= 3737649152 && $thisiplong <= 3737911295){return true;}
	if($thisiplong >= 3737911296 && $thisiplong <= 3738042367){return true;}
	if($thisiplong >= 3738042368 && $thisiplong <= 3738173439){return true;}
	if($thisiplong >= 3738173440 && $thisiplong <= 3738697727){return true;}
	if($thisiplong >= 3738697728 && $thisiplong <= 3738828799){return true;}
	if($thisiplong >= 3738828800 && $thisiplong <= 3738894335){return true;}
	if($thisiplong >= 3738894336 && $thisiplong <= 3738959871){return true;}
	if($thisiplong >= 3738959872 && $thisiplong <= 3739090943){return true;}
	if($thisiplong >= 3739090944 && $thisiplong <= 3739222015){return true;}
	if($thisiplong >= 3740270592 && $thisiplong <= 3740794879){return true;}
	if($thisiplong >= 3740794880 && $thisiplong <= 3740860415){return true;}
	if($thisiplong >= 3740860416 && $thisiplong <= 3740893183){return true;}
	if($thisiplong >= 3740893184 && $thisiplong <= 3740901375){return true;}
	if($thisiplong >= 3740901376 && $thisiplong <= 3740905471){return true;}
	if($thisiplong >= 3740905472 && $thisiplong <= 3740909567){return true;}
	if($thisiplong >= 3740909568 && $thisiplong <= 3740925951){return true;}
	if($thisiplong >= 3741319168 && $thisiplong <= 3741450239){return true;}
	if($thisiplong >= 3741450240 && $thisiplong <= 3741581311){return true;}
	if($thisiplong >= 3741581312 && $thisiplong <= 3741843455){return true;}
	if($thisiplong >= 3741843456 && $thisiplong <= 3742367743){return true;}
	if($thisiplong >= 3742629888 && $thisiplong <= 3742760959){return true;}
	if($thisiplong >= 3743135744 && $thisiplong <= 3743136767){return true;}
	if($thisiplong >= 3745513472 && $thisiplong <= 3749707775){return true;}
	if($thisiplong >= 3749707776 && $thisiplong <= 3749838847){return true;}
	if($thisiplong >= 3750756352 && $thisiplong <= 3751804927){return true;}
	if($thisiplong >= 3751804928 && $thisiplong <= 3752067071){return true;}
	if($thisiplong >= 3752198144 && $thisiplong <= 3752329215){return true;}
	if($thisiplong >= 3753902080 && $thisiplong <= 3754033151){return true;}
	if($thisiplong >= 3754295296 && $thisiplong <= 3754426367){return true;}
	if($thisiplong >= 3754491904 && $thisiplong <= 3754557439){return true;}
	if($thisiplong >= 3754557440 && $thisiplong <= 3754688511){return true;}
	if($thisiplong >= 3754950656 && $thisiplong <= 3755212799){return true;}
	if($thisiplong >= 3755212800 && $thisiplong <= 3755343871){return true;}
	if($thisiplong >= 3755343872 && $thisiplong <= 3755474943){return true;}
	if($thisiplong >= 3755737088 && $thisiplong <= 3755868159){return true;}
	if($thisiplong >= 3755978752 && $thisiplong <= 3755982847){return true;}
	if($thisiplong >= 3755982848 && $thisiplong <= 3755986943){return true;}
	if($thisiplong >= 3757047808 && $thisiplong <= 3757572095){return true;}
	if($thisiplong >= 3757572096 && $thisiplong <= 3757834239){return true;}
	if($thisiplong >= 3757867008 && $thisiplong <= 3757899775){return true;}
	if($thisiplong >= 3757965312 && $thisiplong <= 3758030847){return true;}
	if($thisiplong >= 3758030848 && $thisiplong <= 3758063615){return true;}
	if($thisiplong >= 3758091264 && $thisiplong <= 3758092287){return true;}
	if($thisiplong >= 3758095360 && $thisiplong <= 3758095871){return true;}
	
	
	return false;
	}

	function is_taiwan_ip($ip) {
	  $longip = sprintf("%u", ip2long($ip));
	  if (($longip>=19005440 AND $longip<=19136511)
		OR ($longip>=27262976 AND $longip<=28311551)
		OR ($longip>=456327168 AND $longip<=456523775)
		OR ($longip>=462618624 AND $longip<=462635007)
		OR ($longip>=468713472 AND $longip<=469237759)
		OR ($longip>=978714624 AND $longip<=978780159)
		OR ($longip>=979566592 AND $longip<=979599359)
		OR ($longip>=980549632 AND $longip<=980680703)
		OR ($longip>=996671488 AND $longip<=996802559)
		OR ($longip>=997195776 AND $longip<=998244351)
		OR ($longip>=1019609088 AND $longip<=1019740159)
		OR ($longip>=1022623744 AND $longip<=1022722047)
		OR ($longip>=1022885888 AND $longip<=1023148031)
		OR ($longip>=1024361472 AND $longip<=1024361487)
		OR ($longip>=1024361728 AND $longip<=1024361759)
		OR ($longip>=1024361808 AND $longip<=1024361823)
		OR ($longip>=1024361832 AND $longip<=1024362239)
		OR ($longip>=1024366336 AND $longip<=1024366591)
		OR ($longip>=1024366976 AND $longip<=1024367039)
		OR ($longip>=1024369920 AND $longip<=1024370175)
		OR ($longip>=1024373824 AND $longip<=1024373887)
		OR ($longip>=1024374080 AND $longip<=1024374111)
		OR ($longip>=1024375808 AND $longip<=1024375999)
		OR ($longip>=1024376096 AND $longip<=1024376111)
		OR ($longip>=1024376160 AND $longip<=1024376191)
		OR ($longip>=1024376256 AND $longip<=1024376463)
		OR ($longip>=1024376472 AND $longip<=1024376479)
		OR ($longip>=1024376512 AND $longip<=1024376575)
		OR ($longip>=1024376768 AND $longip<=1024376799)
		OR ($longip>=1024720896 AND $longip<=1024786431)
		OR ($longip>=1025376256 AND $longip<=1025507327)
		OR ($longip>=1027080192 AND $longip<=1027866623)
		OR ($longip>=1027997696 AND $longip<=1028128767)
		OR ($longip>=1037565952 AND $longip<=1037591499)
		OR ($longip>=1037591504 AND $longip<=1038614527)
		OR ($longip>=1039638528 AND $longip<=1039642623)
		OR ($longip>=1072934880 AND $longip<=1072934911)
		OR ($longip>=1087495520 AND $longip<=1087495535)
		OR ($longip>=1120150032 AND $longip<=1120150039)
		OR ($longip>=1120151696 AND $longip<=1120151711)
		OR ($longip>=1125110928 AND $longip<=1125110943)
		OR ($longip>=1296258048 AND $longip<=1296258303)
		OR ($longip>=1310248400 AND $longip<=1310248415)
		OR ($longip>=1847066624 AND $longip<=1847590911)
		OR ($longip>=1848803328 AND $longip<=1848819711)
		OR ($longip>=1866674176 AND $longip<=1866678271)
		OR ($longip>=1866858496 AND $longip<=1866989567)
		OR ($longip>=1867513856 AND $longip<=1867775999)
		OR ($longip>=1870495744 AND $longip<=1870497791)
		OR ($longip>=1874329600 AND $longip<=1874460671)
		OR ($longip>=1877721088 AND $longip<=1877737471)
		OR ($longip>=1877999616 AND $longip<=1879048191)
		OR ($longip>=1884164096 AND $longip<=1884168191)
		OR ($longip>=1884176384 AND $longip<=1884184575)
		OR ($longip>=1884186624 AND $longip<=1884188671)
		OR ($longip>=1885863936 AND $longip<=1885995007)
		OR ($longip>=1886986240 AND $longip<=1886990335)
		OR ($longip>=1886994432 AND $longip<=1887005695)
		OR ($longip>=1897222144 AND $longip<=1897226239)
		OR ($longip>=1897242624 AND $longip<=1897250815)
		OR ($longip>=1899855872 AND $longip<=1899888639)
		OR ($longip>=1908670464 AND $longip<=1908735999)
		OR ($longip>=1914175488 AND $longip<=1914437631)
		OR ($longip>=1914576896 AND $longip<=1914580991)
		OR ($longip>=1914699776 AND $longip<=1915748351)
		OR ($longip>=1921515520 AND $longip<=1921646591)
		OR ($longip>=1921777664 AND $longip<=1921843199)
		OR ($longip>=1925619712 AND $longip<=1925627903)
		OR ($longip>=1931362304 AND $longip<=1931378687)
		OR ($longip>=1932161024 AND $longip<=1932163071)
		OR ($longip>=1932197888 AND $longip<=1932263423)
		OR ($longip>=1934622720 AND $longip<=1934884863)
		OR ($longip>=1934987264 AND $longip<=1934991359)
		OR ($longip>=1940242432 AND $longip<=1940258815)
		OR ($longip>=1946173680 AND $longip<=1946173687)
		OR ($longip>=1946173696 AND $longip<=1946173951)
		OR ($longip>=1949442048 AND $longip<=1949446143)
		OR ($longip>=1950023680 AND $longip<=1950089215)
		OR ($longip>=1952022528 AND $longip<=1952026623)
		OR ($longip>=1953923072 AND $longip<=1953939455)
		OR ($longip>=1960071168 AND $longip<=1960075263)
		OR ($longip>=1960181760 AND $longip<=1960185855)
		OR ($longip>=1964179456 AND $longip<=1964244991)
		OR ($longip>=1966596096 AND $longip<=1966600191)
		OR ($longip>=1966604288 AND $longip<=1966669823)
		OR ($longip>=1969709056 AND $longip<=1969713151)
		OR ($longip>=1986202624 AND $longip<=1986202879)
		OR ($longip>=1986232320 AND $longip<=1986265087)
		OR ($longip>=1989541888 AND $longip<=1989607423)
		OR ($longip>=1990197248 AND $longip<=1990983679)
		OR ($longip>=1994850304 AND $longip<=1995046911)
		OR ($longip>=1997406208 AND $longip<=1997471743)
		OR ($longip>=1997520896 AND $longip<=1997537279)
		OR ($longip>=1998458880 AND $longip<=1998462975)
		OR ($longip>=1998565376 AND $longip<=1998569471)
		OR ($longip>=2001465344 AND $longip<=2001469439)
		OR ($longip>=2001567744 AND $longip<=2001600511)
		OR ($longip>=2007035904 AND $longip<=2007039999)
		OR ($longip>=2019557376 AND $longip<=2021654527)
		OR ($longip>=2033356800 AND $longip<=2033358847)
		OR ($longip>=2033364992 AND $longip<=2033369087)
		OR ($longip>=2046705664 AND $longip<=2046722047)
		OR ($longip>=2053308416 AND $longip<=2053324799)
		OR ($longip>=2053390336 AND $longip<=2053406719)
		OR ($longip>=2054422528 AND $longip<=2054619135)
		OR ($longip>=2054684672 AND $longip<=2055208959)
		OR ($longip>=2055229440 AND $longip<=2055231487)
		OR ($longip>=2056265728 AND $longip<=2056273919)
		OR ($longip>=2056388608 AND $longip<=2056519679)
		OR ($longip>=2056816512 AND $longip<=2056816639)
		OR ($longip>=2059966464 AND $longip<=2059968511)
		OR ($longip>=2060025856 AND $longip<=2060058623)
		OR ($longip>=2063107664 AND $longip<=2063107671)
		OR ($longip>=2063376384 AND $longip<=2063380479)
		OR ($longip>=2063466496 AND $longip<=2063482879)
		OR ($longip>=2063552512 AND $longip<=2063556607)
		OR ($longip>=2063605760 AND $longip<=2063613951)
		OR ($longip>=2063646720 AND $longip<=2063663103)
		OR ($longip>=2066882560 AND $longip<=2066890751)
		OR ($longip>=2066972672 AND $longip<=2067005439)
		OR ($longip>=2070085632 AND $longip<=2070102015)
		OR ($longip>=2070806528 AND $longip<=2070872063)
		OR ($longip>=2076180480 AND $longip<=2076442623)
		OR ($longip>=2076966912 AND $longip<=2077097983)
		OR ($longip>=2079326208 AND $longip<=2079457279)
		OR ($longip>=2080112640 AND $longip<=2080145407)
		OR ($longip>=2080366592 AND $longip<=2080368639)
		OR ($longip>=2080768000 AND $longip<=2080776191)
		OR ($longip>=2080899072 AND $longip<=2081226751)
		OR ($longip>=2082308096 AND $longip<=2082324479)
		OR ($longip>=2087485440 AND $longip<=2087501823)
		OR ($longip>=2087546880 AND $longip<=2087550975)
		OR ($longip>=2090237952 AND $longip<=2090239999)
		OR ($longip>=2090565632 AND $longip<=2090582015)
		OR ($longip>=2093432832 AND $longip<=2093445119)
		OR ($longip>=2094661632 AND $longip<=2094759935)
		OR ($longip>=2101272576 AND $longip<=2101276671)
		OR ($longip>=2111832064 AND $longip<=2112487423)
		OR ($longip>=2113683488 AND $longip<=2113683519)
		OR ($longip>=2113683600 AND $longip<=2113683615)
		OR ($longip>=2113683680 AND $longip<=2113683775)
		OR ($longip>=2113684096 AND $longip<=2113684127)
		OR ($longip>=2113684224 AND $longip<=2113684239)
		OR ($longip>=2113684256 AND $longip<=2113684271)
		OR ($longip>=2113684432 AND $longip<=2113684439)
		OR ($longip>=2113684448 AND $longip<=2113684511)
		OR ($longip>=2113684736 AND $longip<=2113684991)
		OR ($longip>=2113685232 AND $longip<=2113685247)
		OR ($longip>=2113686080 AND $longip<=2113686207)
		OR ($longip>=2113686336 AND $longip<=2113686399)
		OR ($longip>=2113686528 AND $longip<=2113687039)
		OR ($longip>=2113688064 AND $longip<=2113688319)
		OR ($longip>=2258591840 AND $longip<=2258591847)
		OR ($longip>=2258591856 AND $longip<=2258591935)
		OR ($longip>=2258595008 AND $longip<=2258595023)
		OR ($longip>=2258595232 AND $longip<=2258595263)
		OR ($longip>=2258595336 AND $longip<=2258595343)
		OR ($longip>=2258595464 AND $longip<=2258595471)
		OR ($longip>=2258595584 AND $longip<=2258595591)
		OR ($longip>=2258597072 AND $longip<=2258597087)
		OR ($longip>=2258598080 AND $longip<=2258598111)
		OR ($longip>=2258598336 AND $longip<=2258598351)
		OR ($longip>=2258603744 AND $longip<=2258603751)
		OR ($longip>=2258614784 AND $longip<=2258614799)
		OR ($longip>=2261778432 AND $longip<=2261843967)
		OR ($longip>=2343501824 AND $longip<=2343567359)
		OR ($longip>=2346647552 AND $longip<=2346713087)
		OR ($longip>=2354839552 AND $longip<=2354905087)
		OR ($longip>=2355101696 AND $longip<=2355167231)
		OR ($longip>=2355953664 AND $longip<=2357919743)
		OR ($longip>=2735538176 AND $longip<=2736848895)
		OR ($longip>=2824798208 AND $longip<=2824863743)
		OR ($longip>=2849178368 AND $longip<=2849178623)
		OR ($longip>=2905407744 AND $longip<=2905407999)
		OR ($longip>=2938712064 AND $longip<=2938716159)
		OR ($longip>=2942304256 AND $longip<=2942566399)
		OR ($longip>=2943295488 AND $longip<=2943303679)
		OR ($longip>=2943336448 AND $longip<=2943352831)
		OR ($longip>=2947809280 AND $longip<=2948071423)
		OR ($longip>=2948132864 AND $longip<=2948134911)
		OR ($longip>=3025928192 AND $longip<=3025932287)
		OR ($longip>=3031433216 AND $longip<=3031564287)
		OR ($longip>=3033268224 AND $longip<=3033530367)
		OR ($longip>=3033968640 AND $longip<=3033972735)
		OR ($longip>=3034120192 AND $longip<=3034251263)
		OR ($longip>=3034500096 AND $longip<=3034501119)
		OR ($longip>=3064791040 AND $longip<=3064807423)
		OR ($longip>=3064808448 AND $longip<=3064809471)
		OR ($longip>=3068723200 AND $longip<=3068919807)
		OR ($longip>=3081846784 AND $longip<=3081847807)
		OR ($longip>=3225944832 AND $longip<=3226008831)
		OR ($longip>=3226707456 AND $longip<=3226715391)
		OR ($longip>=3233590016 AND $longip<=3233590271)
		OR ($longip>=3233808384 AND $longip<=3233873919)
		OR ($longip>=3262473986 AND $longip<=3262473986)
		OR ($longip>=3262473994 AND $longip<=3262473995)
		OR ($longip>=3262473999 AND $longip<=3262473999)
		OR ($longip>=3262474001 AND $longip<=3262474001)
		OR ($longip>=3262474003 AND $longip<=3262474003)
		OR ($longip>=3262474005 AND $longip<=3262474005)
		OR ($longip>=3262474008 AND $longip<=3262474009)
		OR ($longip>=3262474039 AND $longip<=3262474039)
		OR ($longip>=3262474064 AND $longip<=3262474064)
		OR ($longip>=3262474071 AND $longip<=3262474071)
		OR ($longip>=3262474084 AND $longip<=3262474084)
		OR ($longip>=3262474116 AND $longip<=3262474116)
		OR ($longip>=3262474119 AND $longip<=3262474119)
		OR ($longip>=3262474121 AND $longip<=3262474121)
		OR ($longip>=3262474137 AND $longip<=3262474137)
		OR ($longip>=3262474140 AND $longip<=3262474140)
		OR ($longip>=3262474168 AND $longip<=3262474168)
		OR ($longip>=3262474174 AND $longip<=3262474174)
		OR ($longip>=3262474178 AND $longip<=3262474178)
		OR ($longip>=3262474210 AND $longip<=3262474210)
		OR ($longip>=3278939944 AND $longip<=3278939947)
		OR ($longip>=3278939968 AND $longip<=3278939971)
		OR ($longip>=3278940068 AND $longip<=3278940071)
		OR ($longip>=3278940128 AND $longip<=3278940131)
		OR ($longip>=3278942208 AND $longip<=3278942211)
		OR ($longip>=3278942540 AND $longip<=3278942543)
		OR ($longip>=3278942552 AND $longip<=3278942555)
		OR ($longip>=3278942580 AND $longip<=3278942583)
		OR ($longip>=3278942592 AND $longip<=3278942595)
		OR ($longip>=3278942604 AND $longip<=3278942607)
		OR ($longip>=3278942680 AND $longip<=3278942683)
		OR ($longip>=3278942700 AND $longip<=3278942703)
		OR ($longip>=3389142016 AND $longip<=3389143039)
		OR ($longip>=3389235200 AND $longip<=3389243391)
		OR ($longip>=3389303040 AND $longip<=3389303295)
		OR ($longip>=3389326336 AND $longip<=3389326847)
		OR ($longip>=3389327360 AND $longip<=3389329407)
		OR ($longip>=3389382656 AND $longip<=3389390847)
		OR ($longip>=3389417472 AND $longip<=3389417983)
		OR ($longip>=3389525504 AND $longip<=3389526015)
		OR ($longip>=3389917184 AND $longip<=3389919231)
		OR ($longip>=3391553536 AND $longip<=3391619071)
		OR ($longip>=3391721984 AND $longip<=3391722239)
		OR ($longip>=3391846400 AND $longip<=3391847423)
		OR ($longip>=3392430272 AND $longip<=3392430303)
		OR ($longip>=3392432512 AND $longip<=3392432543)
		OR ($longip>=3392659456 AND $longip<=3392660831)
		OR ($longip>=3392660848 AND $longip<=3392660911)
		OR ($longip>=3392660928 AND $longip<=3392667647)
		OR ($longip>=3394267136 AND $longip<=3394269183)
		OR ($longip>=3394861312 AND $longip<=3394862079)
		OR ($longip>=3397271552 AND $longip<=3397275647)
		OR ($longip>=3397566264 AND $longip<=3397566271)
		OR ($longip>=3397648384 AND $longip<=3397713919)
		OR ($longip>=3397771264 AND $longip<=3397775887)
		OR ($longip>=3397775920 AND $longip<=3397777535)
		OR ($longip>=3397777552 AND $longip<=3397777583)
		OR ($longip>=3397777600 AND $longip<=3397777791)
		OR ($longip>=3397777808 AND $longip<=3397777839)
		OR ($longip>=3397777856 AND $longip<=3397778175)
		OR ($longip>=3397778192 AND $longip<=3397779455)
		OR ($longip>=3398488064 AND $longip<=3398492159)
		OR ($longip>=3398508544 AND $longip<=3398565887)
		OR ($longip>=3398638176 AND $longip<=3398638191)
		OR ($longip>=3398638368 AND $longip<=3398638383)
		OR ($longip>=3398638400 AND $longip<=3398638415)
		OR ($longip>=3398638480 AND $longip<=3398638495)
		OR ($longip>=3398639264 AND $longip<=3398639271)
		OR ($longip>=3398647296 AND $longip<=3398647551)
		OR ($longip>=3398750208 AND $longip<=3398754303)
		OR ($longip>=3398905856 AND $longip<=3398909951)
		OR ($longip>=3399065600 AND $longip<=3399074495)
		OR ($longip>=3399074528 AND $longip<=3399075487)
		OR ($longip>=3399075504 AND $longip<=3399076431)
		OR ($longip>=3399076448 AND $longip<=3399076607)
		OR ($longip>=3399076640 AND $longip<=3399076687)
		OR ($longip>=3399076704 AND $longip<=3399077079)
		OR ($longip>=3399077088 AND $longip<=3399077359)
		OR ($longip>=3399077376 AND $longip<=3399077887)
		OR ($longip>=3399139328 AND $longip<=3399147519)
		OR ($longip>=3399499776 AND $longip<=3399507967)
		OR ($longip>=3399841792 AND $longip<=3399846399)
		OR ($longip>=3399846408 AND $longip<=3399846919)
		OR ($longip>=3399846936 AND $longip<=3399847247)
		OR ($longip>=3399847264 AND $longip<=3399852031)
		OR ($longip>=3400056832 AND $longip<=3400060927)
		OR ($longip>=3400114176 AND $longip<=3400118271)
		OR ($longip>=3400343552 AND $longip<=3400351743)
		OR ($longip>=3400401920 AND $longip<=3400402175)
		OR ($longip>=3400404992 AND $longip<=3400409087)
		OR ($longip>=3400695808 AND $longip<=3400728575)
		OR ($longip>=3401642496 AND $longip<=3401642751)
		OR ($longip>=3409969152 AND $longip<=3410755583)
		OR ($longip>=3410821120 AND $longip<=3410853887)
		OR ($longip>=3410886656 AND $longip<=3410887679)
		OR ($longip>=3410931712 AND $longip<=3410935807)
		OR ($longip>=3410984960 AND $longip<=3411017727)
		OR ($longip>=3411269632 AND $longip<=3411270143)
		OR ($longip>=3411313152 AND $longip<=3411313663)
		OR ($longip>=3411316736 AND $longip<=3411318783)
		OR ($longip>=3411738624 AND $longip<=3411746815)
		OR ($longip>=3411857408 AND $longip<=3411857663)
		OR ($longip>=3412049920 AND $longip<=3412058111)
		OR ($longip>=3412249472 AND $longip<=3412249599)
		OR ($longip>=3412250376 AND $longip<=3412250383)
		OR ($longip>=3412250512 AND $longip<=3412250527)
		OR ($longip>=3412251392 AND $longip<=3412251647)
		OR ($longip>=3412713472 AND $longip<=3412721663)
		OR ($longip>=3413102592 AND $longip<=3413106687)
		OR ($longip>=3413565440 AND $longip<=3413569535)
		OR ($longip>=3413574400 AND $longip<=3413574655)
		OR ($longip>=3413762048 AND $longip<=3413770239)
		OR ($longip>=3414491136 AND $longip<=3414523903)
		OR ($longip>=3414638592 AND $longip<=3414646783)
		OR ($longip>=3415326720 AND $longip<=3415334911)
		OR ($longip>=3415497728 AND $longip<=3415497983)
		OR ($longip>=3416297472 AND $longip<=3416301567)
		OR ($longip>=3416317952 AND $longip<=3416326143)
		OR ($longip>=3416475648 AND $longip<=3416475903)
		OR ($longip>=3416478464 AND $longip<=3416478479)
		OR ($longip>=3416478528 AND $longip<=3416478543)
		OR ($longip>=3416478672 AND $longip<=3416478687)
		OR ($longip>=3416478848 AND $longip<=3416478911)
		OR ($longip>=3416480256 AND $longip<=3416480383)
		OR ($longip>=3416488579 AND $longip<=3416488579)
		OR ($longip>=3416506368 AND $longip<=3416514559)
		OR ($longip>=3418030080 AND $longip<=3418062847)
		OR ($longip>=3418144768 AND $longip<=3418148863)
		OR ($longip>=3418230784 AND $longip<=3418232831)
		OR ($longip>=3418394368 AND $longip<=3418394623)
		OR ($longip>=3418396424 AND $longip<=3418396479)
		OR ($longip>=3418396544 AND $longip<=3418396575)
		OR ($longip>=3418396672 AND $longip<=3418396703)
		OR ($longip>=3418396720 AND $longip<=3418396735)
		OR ($longip>=3418396752 AND $longip<=3418396775)
		OR ($longip>=3418396784 AND $longip<=3418396799)
		OR ($longip>=3418396816 AND $longip<=3418396831)
		OR ($longip>=3418396840 AND $longip<=3418396863)
		OR ($longip>=3418396896 AND $longip<=3418396927)
		OR ($longip>=3418399472 AND $longip<=3418399487)
		OR ($longip>=3418401648 AND $longip<=3418401719)
		OR ($longip>=3418401728 AND $longip<=3418401799)
		OR ($longip>=3418401808 AND $longip<=3418401823)
		OR ($longip>=3418401904 AND $longip<=3418401919)
		OR ($longip>=3418401936 AND $longip<=3418401983)
		OR ($longip>=3418402016 AND $longip<=3418402031)
		OR ($longip>=3418404160 AND $longip<=3418404175)
		OR ($longip>=3418406712 AND $longip<=3418406719)
		OR ($longip>=3418406784 AND $longip<=3418406799)
		OR ($longip>=3418406832 AND $longip<=3418406847)
		OR ($longip>=3418509056 AND $longip<=3418509119)
		OR ($longip>=3418510272 AND $longip<=3418510279)
		OR ($longip>=3418510329 AND $longip<=3418510329)
		OR ($longip>=3418510720 AND $longip<=3418510847)
		OR ($longip>=3418511408 AND $longip<=3418511415)
		OR ($longip>=3418511424 AND $longip<=3418511439)
		OR ($longip>=3418513216 AND $longip<=3418513231)
		OR ($longip>=3418513248 AND $longip<=3418513279)
		OR ($longip>=3418644992 AND $longip<=3418645247)
		OR ($longip>=3418646784 AND $longip<=3418647039)
		OR ($longip>=3418955776 AND $longip<=3418959871)
		OR ($longip>=3419078656 AND $longip<=3419209727)
		OR ($longip>=3419340800 AND $longip<=3419344895)
		OR ($longip>=3419348992 AND $longip<=3419353087)
		OR ($longip>=3419518976 AND $longip<=3419519999)
		OR ($longip>=3419602944 AND $longip<=3419611135)
		OR ($longip>=3420020736 AND $longip<=3420028927)
		OR ($longip>=3420323840 AND $longip<=3420332031)
		OR ($longip>=3420365848 AND $longip<=3420365855)
		OR ($longip>=3420366048 AND $longip<=3420366055)
		OR ($longip>=3420366064 AND $longip<=3420366079)
		OR ($longip>=3420366640 AND $longip<=3420366647)
		OR ($longip>=3420367776 AND $longip<=3420367791)
		OR ($longip>=3420368936 AND $longip<=3420368943)
		OR ($longip>=3420369240 AND $longip<=3420369255)
		OR ($longip>=3420372736 AND $longip<=3420372767)
		OR ($longip>=3512011808 AND $longip<=3512011823)
		OR ($longip>=3512016576 AND $longip<=3512016591)
		OR ($longip>=3524329472 AND $longip<=3524362239)
		OR ($longip>=3527016448 AND $longip<=3527933951)
		OR ($longip>=3528474624 AND $longip<=3528482815)
		OR ($longip>=3528785920 AND $longip<=3528851455)
		OR ($longip>=3535798272 AND $longip<=3535814655)
		OR ($longip>=3535831040 AND $longip<=3535863807)
		OR ($longip>=3536322560 AND $longip<=3536551935)
		OR ($longip>=3536846848 AND $longip<=3536928767)
		OR ($longip>=3536945152 AND $longip<=3536977919)
		OR ($longip>=3538944000 AND $longip<=3539271679)
		OR ($longip>=3541303296 AND $longip<=3541565439)
		OR ($longip>=3544711168 AND $longip<=3545235455)
		OR ($longip>=3560944896 AND $longip<=3560944899)
		OR ($longip>=3560944952 AND $longip<=3560944955)
		OR ($longip>=3560945044 AND $longip<=3560945047)
		OR ($longip>=3560945108 AND $longip<=3560945111)
		OR ($longip>=3560945132 AND $longip<=3560945135)
		OR ($longip>=3560945411 AND $longip<=3560945411)
		OR ($longip>=3560945429 AND $longip<=3560945429)
		OR ($longip>=3560945434 AND $longip<=3560945434)
		OR ($longip>=3560945438 AND $longip<=3560945438)
		OR ($longip>=3560945459 AND $longip<=3560945459)
		OR ($longip>=3560945473 AND $longip<=3560945473)
		OR ($longip>=3560945477 AND $longip<=3560945477)
		OR ($longip>=3560945588 AND $longip<=3560945591)
		OR ($longip>=3632838400 AND $longip<=3632838431)
		OR ($longip>=3659530240 AND $longip<=3659595775)
		OR ($longip>=3659661312 AND $longip<=3659792383)
		OR ($longip>=3667918848 AND $longip<=3668967423)
		OR ($longip>=3669491712 AND $longip<=3669557247)
		OR ($longip>=3669688320 AND $longip<=3669753855)
		OR ($longip>=3671195648 AND $longip<=3671326719)
		OR ($longip>=3678666752 AND $longip<=3678928895)
		OR ($longip>=3679453184 AND $longip<=3679584255)
		OR ($longip>=3679715328 AND $longip<=3679977471)
		OR ($longip>=3680108544 AND $longip<=3680124927)
		OR ($longip>=3680174080 AND $longip<=3680206847)
		OR ($longip>=3699376128 AND $longip<=3700424703)
		OR ($longip>=3701305344 AND $longip<=3701309439)
		OR ($longip>=3705929728 AND $longip<=3706060799)
		OR ($longip>=3707207680 AND $longip<=3707208703)
		OR ($longip>=3715629056 AND $longip<=3715653631)
		OR ($longip>=3718840320 AND $longip<=3718905855)
		OR ($longip>=3734765568 AND $longip<=3734896639)
		OR ($longip>=3740925952 AND $longip<=3741024255)
	  )
		return TRUE;
	  else
		return FALSE;
	}	
}
?>