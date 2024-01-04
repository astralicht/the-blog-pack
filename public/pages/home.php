<?php
$PAGE_TITLE = "Home";
?>

<style>
    body {
        background-color: var(--darker-color);
        color: white;
    }
</style>

<div flex="v" no-gap>
    <?php include_once("templates/_thin_nav.php"); ?>
    <div class="main-content" flex="v" padding-wider flex-grow="1">
        <header>
            <h1>🍌 banana 🍌</h1>
        </header>
        <section>
            <div flex="h" flex-wrap>
                <?php for ($i = 0; $i < 4; $i++) { ?>
                    <div class="card" dark padding-wider>
                        <span text="medium">Hotdog</span>
                        <img src="public/files/hotdog-roblox.gif" alt="hotdog" width="100%">
                    </div>
                <?php } ?>
            </div>
        </section>

        <section>
            <ul>
                <li>Hello</li>
                <li>I am</li>
                <li>Banana</li>
            </ul>
        </section>

        <section flex="v">
            <hover-toggle>
                <title dark>
                    Hover toggle
                </title>
                <container>
                    <item dark>
                        b a n a n a
                    </item>
                    <item dark>
                        b a n a n a
                    </item>
                    <item dark>
                        b a n a n a
                    </item>
                </container>
            </hover-toggle>

            <button class="click-toggle">
                <title>
                    Click toggle
                </title>
                <container>
                    <item dark>
                        b a n a n a
                    </item>
                    <item dark>
                        b a n a n a
                    </item>
                    <item dark>
                        b a n a n a
                    </item>
                </container>
            </button>
        </section>

        <table dark-text>
            <thead>
                <th>Fruit</th>
                <th>Fruit</th>
                <th>Fruit</th>
            </thead>
            <tbody>
                <tr>
                    <td>Banana</td>
                    <td>Banana</td>
                    <td>Banana</td>
                </tr>
                <tr>
                    <td>Banana</td>
                    <td>Banana</td>
                    <td>Banana</td>
                </tr>
                <tr>
                    <td>Banana</td>
                    <td>Banana</td>
                    <td>Banana</td>
                </tr>
            </tbody>
        </table>

        <select name="" id="" dark-text>
            <option value="">Banana</option>
            <option value="">Banana</option>
            <option value="">Banana</option>
        </select>
    </div>
</div>