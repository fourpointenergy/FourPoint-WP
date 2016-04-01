﻿define(
	 ({
		commonWebmap: {
			selector: {
				lblWebMap: "ΧΑΡΤΗΣ",
				lblLocation: "Τοποθεσία",
				lblContent: "Περιεχόμενο",
				lblPopup: "Αναδυόμενο παράθυρο",
				lblControls: "Πρόσθετα",
				lblOverview: "Χάρτης αναφοράς",
				lblLegend: "Υπόμνημα",
				lblGeocoder: "Εύρεση διεύθυνσης ή μέρους",
				tooltipGeocoder: "Επιτρέπει στους χρήστες να βρίσκουν διευθύνσεις και μέρη στους χάρτες σας.",
				loadingTitle: "Φόρτωση τίτλου",
				entry: "Καταχώριση",
				entries: "Καταχωρίσεις",
				section: "Ενότητα",
				sections: "Ενότητες",
				and: "και",
				action: "Ενέργεια στην ενότητα",
				actions: "Ενέργεια στις ενότητες",
				originalWebmap: "Ο χάρτης που χρησιμοποιείται για τη δημοσίευση του %TPL_NAME%",
				browseMaps: "Επιλέξτε έναν χάρτη",
				createMap: "Δημιουργήστε έναν χάρτη",
				current: "Τρέχων χάρτης",
				select: "Επιλέξτε ή δημιουργήστε έναν χάρτη",
				newMap: "Νέα επιλογή χάρτη",
				newCreatedMap: "Νέα δημιουργία χάρτη",
				webmapDefault: "Προεπιλεγμένος χάρτης",
				customCfg: "Προσαρμοσμένη διαμόρφωση",
				tooltipLocation: "Ορίστε την τοποθεσία που θα εμφανίζει αυτός ο χάρτης.",
				tooltipContent: "Ορίστε τα ορατά θεματικά επίπεδα.",
				tooltipPopup: "Επιλέξτε ένα αναδυόμενο παράθυρο το οποίο θα ανοίγει όταν προβάλλεται αυτός ο χάρτης.",
				tooltipOverview: "Εμφανίστε έναν μικρό χάρτη αναφοράς μαζί με τον κύριο χάρτη.",
				tooltipLegend: "Εμφανίστε το υπόμνημα χάρτη πάνω στο χάρτη (χρήσιμο όταν ο χάρτης έχει πολλά θεματικά επίπεδα και σύμβολα).",
				mapCfgInvite: "Χρησιμοποιήστε αυτά τα στοιχεία ελέγχου για να διαμορφώσετε το χάρτη σας",
				lblLocationAlt: "Μεταβιβάζεται από τον πρώτο χάρτη",
				tooltipLocationAlt: "Η τοποθεσία αυτού του χάρτη συγχρονίζεται με τον πρώτο χάρτη της σειράς. Για να αλλάξετε αυτή τη συμπεριφορά για τη σειρά σας, επιλέξτε Ρυθμίσεις > Επιλογές χάρτη."
			},
			configure: {
				btnReset: "Επαναφορά",
				btnCancel: "Άκυρο",
				tocTitle: "Περιεχόμενο χάρτη",
				tocExplain: "Επιλέξτε ποια θεματικά επίπεδα θα εμφανίζονται.",
				tocNoData: "Δεν μπορεί να διαμορφωθεί θεματικό επίπεδο.",
				tocSave: "Αποθήκευση περιεχομένου χάρτη",
				extentTitle: "Τοποθεσία χάρτη",
				extentExplain: "Μετατοπίστε το χάρτη και εστιάστε για να ορίσετε πώς θα φαίνεται για τους αναγνώστες σας.",
				extentSave: "Αποθήκευση τοποθεσίας χάρτη",
				popupTitle: "Αναδυόμενο παράθυρο χάρτη",
				popupExplain: "Κάντε κλικ σε ένα στοιχείο για το άνοιγμα του αναδυόμενου παραθύρου που θέλετε να εμφανιστεί.",
				popupSave: "Αποθήκευση διαμόρφωσης αναδυόμενων παραθύρων",
				hintNavigation: "Η πλοήγηση χάρτη είναι απενεργοποιημένη."
			},
			editor: {
				loading: "Περιμένετε μέχρι να φορτωθεί το πρόγραμμα επεξεργασίας χαρτών",
				newTitle: "Δημιουργία νέου χάρτη",
				editTitle: "Επεξεργασία χάρτη",
				titleLbl: "Τίτλος",
				titlePh: "Τίτλος χάρτη...",
				folderLbl: "Ο χάρτης θα δημιουργηθεί στον ίδιο φάκελο με την αφήγηση.",
				creating: "Δημιουργία του χάρτη",
				saving: "Αποθήκευση του χάρτη",
				success: "Ο χάρτης αποθηκεύτηκε",
				successCreate: "Ο χάρτης δημιουργήθηκε",
				cancelTitle: "Απόρριψη των μη αποθηκευμένων αλλαγών;",
				errorDuplicate: "Έχετε ήδη έναν χάρτη με αυτόν τον τίτλο",
				errorCreate: "Δεν είναι δυνατή η δημιουργία του χάρτη. Δοκιμάστε ξανά.",
				errorSave: "Δεν είναι δυνατή η αποθήκευση του χάρτη. Δοκιμάστε ξανά.",
				notavailable1: "Δυστυχώς, η δημιουργία και η επεξεργασία χαρτών δεν υποστηρίζεται στο Firefox λόγω ενός τεχνικού περιορισμού. Δημιουργήστε την αφήγησή σας χρησιμοποιώντας διαφορετικό πρόγραμμα περιήγησης ή χρησιμοποιήστε την ακόλουθη λύση.",
				notavailable2: "Δυστυχώς, η δημιουργία ή η επεξεργασία χαρτών δεν υποστηρίζεται, επειδή η εφαρμογή Story Map δεν φιλοξενείται στο %PRODUCT%. Για περισσότερες πληροφορίες, επικοινωνήστε με το διαχειριστή του ArcGIS.",
				notavailable3: "Δυστυχώς, η δημιουργία ή η επεξεργασία χαρτών δεν υποστηρίζεται σε αυτή την έκδοση του Portal for ArcGIS (απαιτείται έκδοση 10.4 ή νεότερη). Για περισσότερες πληροφορίες, επικοινωνήστε με το διαχειριστή του ArcGIS.",
				notavailable4: "Μπορείτε να δημιουργήσετε έναν χάρτη χρησιμοποιώντας το %MV% και, στη συνέχεια, να επιστρέψετε εδώ για να τον προσθέσετε στην αφήγησή σας.",
				notavailable5: "Μπορείτε να επεξεργαστείτε το χάρτη χρησιμοποιώντας το %MV% και, στη συνέχεια, να επιστρέψετε εδώ και να επιλέξετε %apply% για να δείτε τις αλλαγές σας.",
				notavailable6: "εργαλείο προβολής χαρτών",
				notavailable7: "επαναφόρτωση του χάρτη"
			}
		},
		configure: {
			mapdlg:{
				items:{
					organizationLabel: "Ο Οργανισμός μου",
					onlineLabel: "ArcGIS Online",
					contentLabel: "Το Περιεχόμενό μου",
					favoritesLabel: "Τα Αγαπημένα μου"
				},
				title: "Επιλέξτε έναν χάρτη",
				searchTitle: "Αναζήτηση",
				ok: "OK",
				cancel: "Άκυρο",
				placeholder: "Εισαγάγετε όρο αναζήτησης ή ID web χάρτη..."
			}
		}
	})
);
