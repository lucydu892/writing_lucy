<?php
    
class Post {
    private $bgColor;
    private $fontColor;
    private $fontSize;
    private $fontFamily;
    private $fontDeco;
    private $inputText;
    private $image;
    private $imageWidth;
    private $imageHeight;
    private $time;
    private $joke;
    private $userId;

    public function __construct($bgColor, $fontColor, $fontSize, $fontFamily, $fontDeco, $inputText, $image, $imageWidth, $imageHeight, $time, $joke, $userId) {
        $this->bgColor = $bgColor;
        $this->fontColor = $fontColor;
        $this->fontSize = $fontSize;
        $this->fontFamily = $fontFamily;
        $this->fontDeco = $fontDeco;
        $this->inputText = $inputText;
        $this->image = $image;
        $this->imageWidth = $imageWidth;
        $this->imageHeight = $imageHeight;
        $this->time = $time;
        $this->joke = $joke;
        $this->userId = $userId;
    }

    public function getBgColor() {
        return $this->bgColor;
    }
    public function getFontColor() {
        return $this->fontColor;
    }
    public function getFontSize() {
        return $this->fontSize;
    }
    public function getFontFamily() {
        return $this->fontFamily;
    }
    public function getFontDeco() {
        return $this->fontDeco;
    }
    public function getInputText() {
        return $this->inputText;
    }
    public function getImage() {
        return $this->image;
    }
    public function getImageWidth() {
        return $this->imageWidth;
    }
    public function getImageHeight() {
        return $this->imageHeight;
    }
    public function getTime() {
        return $this->time;
    }
    public function getJoke() {
        return $this->joke;
    }
    public function getUserId() {
        return $this->userId;
    }

}