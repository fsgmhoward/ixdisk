<?php

session_start();

class CCaptcha

{

	/**

	 * @var integer the width of the generated CAPTCHA image. Defaults to 120.

	 */

	public $width = 150;

	/**

	 * @var integer the height of the generated CAPTCHA image. Defaults to 50.

	 */

	public $height = 50;

	/**

	 * @var integer padding around the text. Defaults to 2.

	 */

	public $padding = 2;

	/**

	 * @var integer the background color. For example, 0x55FF00.

	 * Defaults to 0xFFFFFF, meaning white color.

	 */

	public $backColor = 0xFFFFFF;

	/**

	 * @var integer the font color. For example, 0x55FF00. Defaults to 0x2040A0 (blue color).

	 */

	public $foreColor = 0x2040A0;

	/**

	 * @var boolean whether to use transparent background. Defaults to false.

	 */

	public $transparent = false;

	/**

	 * @var integer the minimum length for randomly generated word. Defaults to 6.

	 */

	public $minLength = 6;

	/**

	 * @var integer the maximum length for randomly generated word. Defaults to 7.

	 */

	public $maxLength = 7;

	/**

	 * @var integer the offset between characters. Defaults to -2. You can adjust this property

	 * in order to decrease or increase the readability of the captcha.

	 * @since 1.1.7

	 **/

	public $offset = -2;

	/**

	 * @var string the TrueType font file. Defaults to Duality.ttf which is provided

	 * with the Yii release.

	 */

	public $fontFile;

	/**

	 * @var string the fixed verification code. When this is property is set,

	 * {@link getVerifyCode} will always return this value.

	 * This is mainly used in automated tests where we want to be able to reproduce

	 * the same verification code each time we run the tests.

	 * Defaults to null, meaning the verification code will be randomly generated.

	 * @since 1.1.4

	 */

	public $fixedVerifyCode;



	



	/**

	 * Renders the CAPTCHA image based on the code.

	 * @param string $code the verification code

	 * @return string image content

	 */

	public function renderImage($code)

	{

		$image = imagecreatetruecolor($this->width,$this->height);



		$backColor = imagecolorallocate($image,

				(int)($this->backColor % 0x1000000 / 0x10000),

				(int)($this->backColor % 0x10000 / 0x100),

				$this->backColor % 0x100);

		imagefilledrectangle($image,0,0,$this->width,$this->height,$backColor);

		imagecolordeallocate($image,$backColor);



		if($this->transparent)

			imagecolortransparent($image,$backColor);



		$foreColor = imagecolorallocate($image,

				(int)($this->foreColor % 0x1000000 / 0x10000),

				(int)($this->foreColor % 0x10000 / 0x100),

				$this->foreColor % 0x100);



		if($this->fontFile === null)

			$this->fontFile ='./Angryblue.ttf';



		$length = strlen($code);

		$box = imagettfbbox(30,0,$this->fontFile,$code);

		$w = $box[4] - $box[0] + $this->offset * ($length - 1);

		$h = $box[1] - $box[5];

		$scale = min(($this->width - $this->padding * 2) / $w,($this->height - $this->padding * 2) / $h);

		$x = 10;

		$y = round($this->height * 27 / 40);

		for($i = 0; $i < $length; ++$i)

		{

			$fontSize = (int)(rand(23,35) * $scale * 0.8);

			$angle = rand(-10,10);

			$letter = $code[$i];

			$box = imagettftext($image,$fontSize,$angle,$x,$y,$foreColor,$this->fontFile,$letter);

			$x = $box[2] + $this->offset;

		}



		imagecolordeallocate($image,$foreColor);



		header('Pragma: public');

		header('Expires: 0');

		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

		header('Content-Transfer-Encoding: binary');

		header("Content-type: image/png");

		imagepng($image);

		imagedestroy($image);

	}



}

$safecode="";

for($i=0;$i<5;$i++)

{ 

$safecode.=dechex(rand(1,15)); //生成包含十六进制的随机数 

}

$_SESSION['safecode']=$safecode;

$ddd = new CCaptcha();

	$ddd->renderImage($safecode);

?>