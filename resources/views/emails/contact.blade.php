<x-mail::message>
# Nuevo mensaje de contacto

**Nombre:** {{ $contact->name }}
**Email:** {{ $contact->email }}
**Teléfono:** {{ $contact->phone ?: '—' }}
**Asunto:** {{ $contact->subject ?: '—' }}

---

{{ $contact->message }}
</x-mail::message>
