This Excel formula grabs a timecode value from cell A1 and converts it into frames. The timecode should be in the format "01:01:01;01". The formula uses 30 frames per second and does not calculate drop frames.

	=VALUE(LEFT(A1,2))*60*60*30+VALUE(MID(A1,4,2))*60*30+VALUE(MID(A1,7,2))*30+RIGHT(A1,2)

Example:  
A1: 01:06:46;11  
RESULT: 120191  

This Excel formula grabs a number value from cell A2 and converts it into timecode.

	=TEXT(MOD(INT(INT(INT(ABS(A2)/30)/60)/60),60),"00")&":"&TEXT(MOD(INT(INT(ABS(A2)/30)/60),60),"00")&":"&TEXT(MOD(INT(ABS(A2)/30),60),"00")&";"&TEXT(MOD(ABS(A2),30),"00")

Example:  
A2:  112019  
RESULT: 01:02:13;29  

This Excel formula calculates the difference between two timecode values and outputs "GOOD" if they are within 3 frames of each other. Otherwise, it outputs the actual difference as a timecode.

	=IF((A4-A3)=MEDIAN((A4-A3),-3,3),"GOOD",TEXT(MOD(INT(INT(INT(ABS(A4-A3)/30)/60)/60),60),"00")&":"&TEXT(MOD(INT(INT(ABS(A4-A3)/30)/60),60),"00")&":"&TEXT(MOD(INT(ABS(A4-A3)/30),60),"00")&";"&TEXT(MOD(ABS(A4-A3),30),"00"))

Example:  
A3: 01:13:35;05  
A4: 01:13:35;04  
RESULT: GOOD  

A3: 01:15:31;13  
A4: 01:15:30;12  
RESULT: 00:00:01;01  

NOTE:
The formula "IF((A4-A3)=MEDIAN((A4-A3),-3,3)" calculates whether the value of A4-A3 falls within the values -3 and 3. If you were trying to determine whether these two values are 1 second apart, you would use -33 and 33 as your boundaries (30 frames equal 1 second).

WHY I WROTE THIS:
We edit videos for YouTube and Hulu that must contain commercial breaks. After editing, and as a form of quality control, we document the position of every commercial break (so that YouTube and Hulu can properly insert ads into the videos). Because of how we edit the videos, the ad breaks for one are always offset by x seconds in the other. We use these formulas to verify that these differences exist, which helps us make sure no video is missing and edit or graphic.

THANKS:
To [Chandoo.org](http://chandoo.org/wp/2010/06/24/between-formula-excel/) for the great trick to test if a value falls in between two other values.