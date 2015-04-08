<?php
function testmail ()
{
	function testchar ($char, $pos = 0)
			{
				global $_POST['mail'];
				$test=strpos($_POST['mail'], $char)
				return $test
			}
	if ((testchar('@')!== FALSE) && (testchar('.')!== FALSE)) 
	{
			if (testchar('.') < (testchar('@')+3)
			{
				if(testchar('.', testchar('@')+3)!== false)
				{
					$testPosRes = true;
				}
				else
				{
					$testPosRes = false;
				}

			}
			else
			{
				$testPosRes = true;
			}		
	}
	else
		{
			$testPosRes = true;
		}

	return $testPosRes;
}


function testPos()
{
	if testchar('.') < (testchar('@')
	{
		if(testchar('.', testchar('@')+3)!== false)
		{
			$testPosRes = true;
		}
		else
		{
			$testPosRes = false;
		}

	}
	else
	{
		$testPosRes = true;
	}

}