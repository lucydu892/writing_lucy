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

    await page.getByLabel('Dein Text:').fill("Test Text");

    await expect(page.getByText('Test Text')).toBeVisible();
});
test('checkImage', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/home');

    await page.getByLabel('Dein Text:').fill("Test Text");

    await expect(page.getByText('Test Text')).toBeVisible();
});



