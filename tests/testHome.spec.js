// @ts-check
import { test, expect } from '@playwright/test';

test('gotoPageHome', async ({ page }) => {
    // Go to the page
    await page.goto('http://localhost/writing_lucy/home');

    await expect(page.getByRole('heading', { name: 'Writing Lucy' })).toBeVisible();

});
test('checkFontColor', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/home');

    await page.getByText('Textbearbeitung').click();
    await page.getByRole('textbox', { name: 'Schriftfarbe:' }).fill('#ff0000');

    const output = page.locator('#output');
    await expect(output).toHaveCSS('color', 'rgb(255, 0, 0)');
});
test('checkBgColor', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/home');

    await page.getByText('Textbearbeitung').click();
    await page.getByRole('textbox', { name: 'Hintergrundfarbe:' }).fill('#00ff00');

    const output = page.locator('#output');
    await expect(output).toHaveCSS('background-color', 'rgb(0, 255, 0)');
});
test('checkFontSize', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/home');

    await page.getByText('Textbearbeitung').click();
    await page.getByRole('spinbutton', { name: 'Schriftgrösse:' }).fill('30');

    const output = page.locator('#output');
    await expect(output).toHaveCSS('font-size', '30px');
});
test('checkFontFamily', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/home');

    await page.getByText('Textbearbeitung').click();
    await page.getByLabel('Schriftart:').selectOption('Impact');

    const output = page.locator('#output');
    await expect(output).toHaveCSS('font-family', 'Impact');
});
test('checkText', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/home');

    await page.getByRole('textbox', {name: 'Dein Text:'}).fill('Test Text');

    await expect(page.getByText('Test Text')).toBeVisible();
});
test('checkImage', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/home');

    await page.getByLabel('Image-URL:').fill("https://evek.top/4432-medium_default/test.jpg");

    await expect(page.locator('img')).toHaveCount(1);
});
test('checkImageSize', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/home');
    
    await page.getByLabel('Image-URL:').fill("https://evek.top/4432-medium_default/test.jpg");
    await page.getByText('Bildbearbeitung').click();
    await page.getByLabel('Breite des Bildes:').fill('100');
    await page.getByLabel('Höhe des Bildes:').fill('100');
    // Check if the image is displayed
    const img = page.locator('img');
    await expect(img).toHaveCSS('width', '100px');
    await expect(img).toHaveCSS('height', '100px');
});
test('checkReset', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/home');
    
    await page.getByRole('textbox', {name: 'Dein Text:'}).fill('Test Text');

    await page.getByText('Textbearbeitung').click();

    await page.getByRole('textbox', { name: 'Hintergrundfarbe:' }).fill('#00ff00');
    await page.getByRole('textbox', { name: 'Schriftfarbe:' }).fill('#ff0000');
    await page.getByRole('spinbutton', { name: 'Schriftgrösse:' }).fill('30');
    await page.getByLabel('Schriftart:').selectOption('Impact');

    await page.getByLabel('Image-URL:').fill("https://evek.top/4432-medium_default/test.jpg");

    await page.getByText('Bildbearbeitung').click();

    await page.getByLabel('Breite des Bildes:').fill('100');
    await page.getByLabel('Höhe des Bildes:').fill('100');

    // Reset the personalization
    await page.getByRole('button', { name: 'Reset' }).click();

    // Check if the default values are set
    const output = page.locator('#output');
    await expect(output).toHaveCSS('background-color', 'rgb(13, 11, 78)');
    await expect(output).toHaveCSS('color', 'rgb(255, 255, 255)');
});




