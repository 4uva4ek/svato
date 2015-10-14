<h1 class="con_heading" style="margin-bottom:4px;">{$LANG.MAPS_ITEM_ABUSE}</h1>

<form action="" method="post">

    <table cellpadding="0" cellspacing="0" border="0">
        <tr style="height:30px">
            <td width="120">
                {$LANG.MAPS_ITEM_ABUSE_TARGET}:
            </td>
            <td>
                <a href="/maps/{$item.seolink}.html">{$item.title}</a>
            </td>
        </tr>
        <tr>
            <td>
                {$LANG.MAPS_ITEM_ABUSE_MSG}:
            </td>
            <td>
                <input type="text" id="message" name="message" value="" style="width:300px" maxsize="100" />
            </td>
        </tr>
    </table>

    <p style="margin-top:20px">
        <input type="submit" name="submit" value="{$LANG.SEND}" />
        <input type="button" name="cancel" value="{$LANG.CANCEL}" onclick="window.history.go(-1)" />
    </p>

</form>

<script type="text/javascript">
    $('#message').focus();
</script>