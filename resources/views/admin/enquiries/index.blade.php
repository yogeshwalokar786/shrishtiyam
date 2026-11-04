@extends('layouts.admin')

@section('title', 'Messages')
@section('page_title', 'Messages')

@section('content')
<div class="content-header">
    <div>
        <h1 class="page-title">Messages</h1>
    </div>
</div>

<!-- Quick Metrics KPI Row -->
<div class="kpi-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px; margin-bottom: 24px;">
    <div class="card" style="padding: 20px; border-left: 4px solid var(--primary);">
        <div style="font-size: 0.82rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Total Messages</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: var(--text-main);">{{ number_format($stats['total']) }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #ef4444;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #ef4444; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Unread</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #ef4444;">{{ number_format($stats['new']) }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #f59e0b;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #d97706; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">In Progress</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #d97706;">{{ number_format($stats['in_progress']) }}</div>
    </div>

    <div class="card" style="padding: 20px; border-left: 4px solid #10b981;">
        <div style="font-size: 0.82rem; font-weight: 700; color: #059669; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">Resolved</div>
        <div style="font-size: 1.85rem; font-weight: 800; color: #059669;">{{ number_format($stats['resolved']) }}</div>
    </div>
</div>

<!-- Filters & Search Toolbar -->
<div class="card" style="margin-bottom: 24px; padding: 18px 22px;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <!-- Status Tabs -->
        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <a href="{{ route('admin.enquiries.index', ['status' => 'all', 'search' => $search]) }}" 
               class="btn {{ $status === 'all' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 6px 14px; font-size: 0.84rem;">
               All ({{ $stats['total'] }})
            </a>
            <a href="{{ route('admin.enquiries.index', ['status' => 'new', 'search' => $search]) }}" 
               class="btn {{ $status === 'new' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 6px 14px; font-size: 0.84rem;">
               Unread ({{ $stats['new'] }})
            </a>
            <a href="{{ route('admin.enquiries.index', ['status' => 'in_progress', 'search' => $search]) }}" 
               class="btn {{ $status === 'in_progress' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 6px 14px; font-size: 0.84rem;">
               In Progress ({{ $stats['in_progress'] }})
            </a>
            <a href="{{ route('admin.enquiries.index', ['status' => 'resolved', 'search' => $search]) }}" 
               class="btn {{ $status === 'resolved' ? 'btn-primary' : 'btn-secondary' }}" style="padding: 6px 14px; font-size: 0.84rem;">
               Resolved ({{ $stats['resolved'] }})
            </a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.enquiries.index') }}" style="display: flex; gap: 8px;">
            <input type="hidden" name="status" value="{{ $status }}">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search name, email, message..." 
                   class="form-control" style="width: 260px; padding: 7px 12px; font-size: 0.85rem;">
            <button type="submit" class="btn btn-secondary" style="padding: 7px 14px; font-size: 0.85rem;">Search</button>
            @if(!empty($search))
                <a href="{{ route('admin.enquiries.index', ['status' => $status]) }}" class="btn btn-secondary" style="padding: 7px 12px; font-size: 0.85rem;" title="Clear Search">✕</a>
            @endif
        </form>
    </div>
</div>

<!-- Enquiries Table -->
<div class="card" style="padding: 0; overflow: hidden;">
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem;">
            <thead>
                <tr style="background: var(--bg-surface-elevated); border-bottom: 1px solid var(--border-medium); color: var(--text-muted); font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.5px;">
                    <th style="padding: 14px 20px;">Sender</th>
                    <th style="padding: 14px 20px;">Subject & Message</th>
                    <th style="padding: 14px 20px;">Source</th>
                    <th style="padding: 14px 20px;">Status</th>
                    <th style="padding: 14px 20px;">Date</th>
                    <th style="padding: 14px 20px; text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enquiries as $item)
                    @php $badge = $item->status_badge; @endphp
                    <tr style="border-bottom: 1px solid var(--border-subtle); transition: background 0.15s ease;">
                        <td style="padding: 16px 20px; vertical-align: top;">
                            <div style="font-weight: 700; color: var(--text-main);">{{ $item->name }}</div>
                            <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 2px;">
                                <a href="mailto:{{ $item->email }}" style="color: var(--primary); text-decoration: none;">{{ $item->email }}</a>
                            </div>
                            @if($item->company)
                                <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 2px;">
                                    <span style="font-weight: 600;">Company:</span> {{ $item->company }}
                                </div>
                            @endif
                            @if($item->phone)
                                <div style="font-size: 0.8rem; color: var(--text-muted); font-family: var(--font-mono);">
                                    {{ $item->phone }}
                                </div>
                            @endif
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; max-width: 320px;">
                            <div style="font-weight: 600; color: var(--text-main); margin-bottom: 4px;">
                                {{ $item->subject ?? $item->requirement ?? 'Message' }}
                            </div>
                            @if($item->message)
                                <div style="font-size: 0.82rem; color: var(--text-muted); overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; line-height: 1.4;">
                                    {{ $item->message }}
                                </div>
                            @elseif($item->projected_volume)
                                <div style="font-size: 0.82rem; color: var(--text-muted);">
                                    <span style="font-weight: 600;">Details:</span> {{ $item->projected_volume }}
                                </div>
                            @endif
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            @if($item->source === 'contact_page')
                                <span style="font-size: 0.78rem; font-weight: 600; padding: 4px 8px; border-radius: 4px; background: rgba(59, 130, 246, 0.1); color: #2563eb;">Contact Page</span>
                            @else
                                <span style="font-size: 0.78rem; font-weight: 600; padding: 4px 8px; border-radius: 4px; background: rgba(139, 92, 246, 0.1); color: #7c3aed;">Website Modal</span>
                            @endif
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top;">
                            <span style="display: inline-block; font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: 12px; background: {{ $badge['bg'] }}; color: {{ $badge['color'] }}; border: 1px solid {{ $badge['border'] }};">
                                {{ $badge['label'] }}
                            </span>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; font-size: 0.82rem; color: var(--text-muted); white-space: nowrap;">
                            {{ $item->created_at->format('M d, Y') }}<br>
                            <span style="font-size: 0.78rem; color: var(--text-muted);">{{ $item->created_at->format('H:i') }} ({{ $item->created_at->diffForHumans() }})</span>
                        </td>

                        <td style="padding: 16px 20px; vertical-align: top; text-align: right; white-space: nowrap;">
                            <button type="button" class="btn btn-secondary btn-sm" 
                                    onclick="openEnquiryModal({{ json_encode($item) }})" 
                                    style="padding: 6px 12px; font-size: 0.82rem;">
                                View
                            </button>

                            <form method="POST" action="{{ route('admin.enquiries.destroy', $item->id) }}" style="display: inline-block; margin-left: 6px;" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding: 6px 10px; font-size: 0.82rem;" title="Delete message">
                                    ✕
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 48px 20px; text-align: center; color: var(--text-muted);">
                            <div style="font-size: 1.1rem; font-weight: 600; margin-bottom: 6px;">No messages found</div>
                            <p style="font-size: 0.85rem; margin: 0;">Messages submitted through your website will appear here.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($enquiries->hasPages())
        <div style="padding: 16px 20px; border-top: 1px solid var(--border-medium);">
            {{ $enquiries->links() }}
        </div>
    @endif
</div>
@endsection

@push('modals')
<!-- Modal: View Message Details -->
<div id="enquiryDetailsModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); z-index: 99999; align-items: center; justify-content: center; padding: 20px;">
    <div class="card" style="width: 100%; max-width: 650px; max-height: 90vh; overflow-y: auto; padding: 28px; position: relative; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);">
        <button type="button" onclick="closeEnquiryModal()" style="position: absolute; top: 20px; right: 20px; background: none; border: none; font-size: 1.3rem; color: var(--text-muted); cursor: pointer;">✕</button>

        <div style="margin-bottom: 20px;">
            <span id="modalSourceBadge" style="font-size: 0.78rem; font-weight: 700; padding: 4px 8px; border-radius: 4px; text-transform: uppercase;"></span>
            <h3 id="modalName" style="font-size: 1.45rem; margin-top: 8px; margin-bottom: 4px;"></h3>
            <div id="modalMeta" style="font-size: 0.85rem; color: var(--text-muted);"></div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 20px; background: var(--bg-surface-elevated); padding: 14px 18px; border-radius: var(--radius-md); border: 1px solid var(--border-subtle); font-size: 0.86rem;">
            <div>
                <strong style="display: block; font-size: 0.78rem; color: var(--text-muted); text-transform: uppercase;">Email</strong>
                <a id="modalEmail" href="" style="color: var(--primary); text-decoration: none; font-weight: 600;"></a>
            </div>
            <div>
                <strong style="display: block; font-size: 0.78rem; color: var(--text-muted); text-transform: uppercase;">Phone</strong>
                <span id="modalPhone" style="font-weight: 600;"></span>
            </div>
            <div>
                <strong style="display: block; font-size: 0.78rem; color: var(--text-muted); text-transform: uppercase;">Company / Organization</strong>
                <span id="modalCompany" style="font-weight: 600;"></span>
            </div>
            <div>
                <strong style="display: block; font-size: 0.78rem; color: var(--text-muted); text-transform: uppercase;">Details / Note</strong>
                <span id="modalVolume" style="font-weight: 600;"></span>
            </div>
        </div>

        <div style="margin-bottom: 22px;">
            <strong style="display: block; font-size: 0.82rem; color: var(--text-muted); text-transform: uppercase; margin-bottom: 6px;">Subject</strong>
            <div id="modalSubject" style="font-weight: 700; font-size: 1rem; color: var(--text-main); margin-bottom: 12px;"></div>

            <strong style="display: block; font-size: 0.82rem; color: var(--text-muted); text-transform: uppercase; margin-bottom: 6px;">Message</strong>
            <div id="modalMessage" style="background: var(--bg-surface-elevated); padding: 14px 18px; border-radius: var(--radius-md); border: 1px solid var(--border-medium); font-size: 0.9rem; line-height: 1.6; white-space: pre-wrap; color: var(--text-main);"></div>
        </div>

        <!-- Status & Notes Update Form -->
        <form id="modalStatusForm" method="POST" action="" style="border-top: 1px solid var(--border-medium); padding-top: 20px;">
            @csrf
            @method('PATCH')

            <h4 style="font-size: 1rem; margin-bottom: 12px;">Update Status</h4>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px;">
                <div>
                    <label style="display: block; font-size: 0.84rem; font-weight: 600; margin-bottom: 6px;">Status</label>
                    <select name="status" id="modalStatusSelect" class="form-control" style="width: 100%;">
                        <option value="new">Unread</option>
                        <option value="in_progress">In Progress</option>
                        <option value="resolved">Resolved</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>
                <div style="display: flex; align-items: flex-end;">
                    <a id="modalMailtoBtn" href="" class="btn btn-secondary" style="width: 100%; text-align: center; text-decoration: none;">
                        ✉️ Reply by Email
                    </a>
                </div>
            </div>

            <div style="margin-bottom: 18px;">
                <label style="display: block; font-size: 0.84rem; font-weight: 600; margin-bottom: 6px;">Notes</label>
                <textarea name="admin_notes" id="modalAdminNotes" rows="2" class="form-control" placeholder="Notes"></textarea>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeEnquiryModal()" class="btn btn-secondary">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endpush

@push('scripts')
<script>
function openEnquiryModal(item) {
    document.getElementById('modalName').textContent = item.name;
    document.getElementById('modalEmail').textContent = item.email;
    document.getElementById('modalEmail').href = 'mailto:' + item.email;
    document.getElementById('modalMailtoBtn').href = 'mailto:' + item.email + '?subject=' + encodeURIComponent('Re: ' + (item.subject || 'Your Inquiry with CircuFlow'));
    document.getElementById('modalPhone').textContent = item.phone || 'Not provided';
    document.getElementById('modalCompany').textContent = item.company || 'Not provided';
    document.getElementById('modalVolume').textContent = item.projected_volume || 'N/A';
    document.getElementById('modalSubject').textContent = item.subject || item.requirement || 'General Inquiry';
    document.getElementById('modalMessage').textContent = item.message || 'No extended message provided with this submission.';
    document.getElementById('modalMeta').textContent = 'Received ' + item.created_at + (item.ip_address ? ' • IP: ' + item.ip_address : '');

    const badge = document.getElementById('modalSourceBadge');
    if (item.source === 'contact_page') {
        badge.textContent = 'Contact Page Submission';
        badge.style.background = 'rgba(59, 130, 246, 0.1)';
        badge.style.color = '#2563eb';
    } else {
        badge.textContent = 'Consultation Modal Lead';
        badge.style.background = 'rgba(139, 92, 246, 0.1)';
        badge.style.color = '#7c3aed';
    }

    document.getElementById('modalStatusSelect').value = item.status || 'new';
    document.getElementById('modalAdminNotes').value = item.admin_notes || '';
    document.getElementById('modalStatusForm').action = '/admin/enquiries/' + item.id + '/status';

    const modal = document.getElementById('enquiryDetailsModal');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeEnquiryModal() {
    const modal = document.getElementById('enquiryDetailsModal');
    modal.style.display = 'none';
    document.body.style.overflow = '';
}
</script>
@endpush
